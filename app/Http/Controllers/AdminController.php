<?php

namespace App\Http\Controllers;

use App\Photo;
use App\PhotoType;
use App\Stats;
use App\User;
use App\UserBase;
use Cyberduck\LaravelExcel\ExporterFacade;
use Cyberduck\LaravelExcel\ImporterFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    public function index()
    {
        //$users = User::where('admin', '!=', 1)->orderByDesc('id')->get();
        $users = User::where('admin', '!=', 1)
            ->leftJoin('user_infos', function ($join) {
                return $join->on('user_infos.user_id', '=', 'users.id');
            })->orderByDesc('users.id')->get(['users.id', 'users.nip', 'users.email', 'users.phone', 'user_infos.name as shop_name', 'users.name',
                'users.created_at', 'user_infos.city', 'users.status', 'user_infos.zipCode', 'user_infos.street']);
        return view('admin.index', compact('users'));
    }

    public function import()
    {
        $excel = ImporterFacade::make('Excel');
        $excel->load('excel/d3.xlsx');
        $collection = $excel->getCollection();

        $loop = 1;
        foreach ($collection as $coll) {
            if ($loop == 1) {

            } else {
                UserBase::updateOrCreate([
                    'nip' => $coll[0],
                    'id_abc' => '-',
                    'id_abc_sklep' => '-',
                    'nazwa' => $coll[1],
                    'kontakt' => $coll[5],
                    'kod_pocztowy' => $coll[2],
                    'miejscowosc' => $coll[3],
                    'ulica' => $coll[4],
                    'firma_nazwa' => $coll[1],
                    'firma_kontakt' => $coll[6] . ' ' . $coll[7],
                ], [

                ]);
            }
            $loop++;
        }
        return redirect()->route('admin.index');
    }

    public function rating(User $user)
    {
        $photoTypes = PhotoType::all();
        $userPhotos = $user->photos;
        $photos = [];
        foreach ($userPhotos as $photo) {
            $photos[$photo->photo_type_id] = $photo;
        }

        return view('admin.rating', compact('photos', 'photoTypes', 'user'));
    }

    public function store(Request $request)
    {
        foreach ($request->rating as $key => $item) {
            $photo = Photo::where('user_id', $request->user_id)->where('photo_type_id', $key)->first();
            if (isset($photo->id)) {
                $photo->rating = $item;
                $photo->save();
            } else {
                return redirect()->back();
            }
        }
        User::whereId($request->user_id)->update(['status' => 3]);
        return redirect()->route('admin.index');
    }

    public function ranking()
    {
        $users = User::where('admin', '!=', '1')->whereStatus(3)->get();
        $ranking = array();
        foreach ($users as $user) {
            $ranking[$user->id] = $user->getPoints();
        }
        $users = User::all();

        arsort($ranking);
        return view('admin.ranking', compact('ranking', 'users'));
    }

    public function clearDB()
    {
        $users = UserBase::all();
        foreach ($users as $user) {
            UserBase::whereNip($user->nip)->whereNazwa($user->nazwa)->whereMiejscowosc($user->miejscowosc)->whereUlica($user->ulica)->where('id', '!=', $user->id)->delete();
        }
        return 'ok';
    }

    public function stats()
    {
        $stats = [];

        $days = Stats::all();
        $applications = User::where('status', '>=', 2)->get();

        $today = date('Y-m-d');


        foreach ($days as $item) {
            $date = date_create($item->created_at);
            $stats[] = date_format($date, 'Y-m-d');

        }
        $apps = [];
        foreach ($applications as $item) {
            $date = date_create($item->created_at);
            $apps[] = date_format($date, 'Y-m-d');

        }
        $days = array_count_values($stats);
        $applications = array_count_values($apps);

        return view('admin.stats', compact('days', 'applications'));

    }

    public function export()
    {
        $users = User::whereStatus(2)
            ->leftJoin('user_infos', function ($join) {
                return $join->on('user_infos.user_id', '=', 'users.id');
            })->get(['users.nip', 'users.email', 'users.phone', 'user_infos.name', 'user_infos.city', 'user_infos.zipCode', 'user_infos.street']);
        $excel = ExporterFacade::make('Excel');

        $collection = new Collection([
            ['nip' => 'NIP', 'email' => 'Email', 'phone' => 'Telefon', 'name' => 'Nazwa', 'city' => 'Miejscowość', 'zipCode' => 'Kod pocztowy', 'street' => 'Ulica']
        ]);
        $excel->load($users);
        return $excel->stream('zgloszenia.xls');
    }
}
