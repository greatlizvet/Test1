<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastaPost;
use App\Pasta;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    //Просмотр всех доступных записей
    public function index(Request $request)
    {
        return view('pasta.index', ['pastas' => $this->getPastas()]);
    }

    //Переход на страницу добавления пасты
    public function create(Request $request)
    {
        return view('pasta.create', ['pastas' => $this->getPastas(), 
                                     'statuses' => Pasta::getStatuses(),
                                     'intervals' => Pasta::getTimeInterval()]);
    }

    //Создание и добавление новой записи
    public function store(PastaPost $request)
    {
        $validation = $request->validated();
        $createParams = $request->all();
        $createdDate = Carbon::now();

        $pasta = new Pasta($validation);
        $pasta->create_date = $createdDate->toDateTimeString();
        $pasta->end_date = $this->setEndTime($createParams['time'], $createdDate);
        $pasta->hash = $this->generateUniqHash();

        $pasta->save();
        return redirect('/')->with('status', 'goodtest.com/' . $pasta->hash);
    }

    public function show($hash)
    {
        $pasta = Pasta::where('hash', $hash)->first();

        if($pasta == null)
        {
            abort(404);
        }

        if($pasta->end_date >= new DateTime())
        {
            return view('pasta.timeout', ['pastas' => $this->getPastas()]);
        }
        

        return view('pasta.show', ['pasta' => $pasta, 'pastas' => $this->getPastas()]);
    }

    private function getPastas()
    {
        $pastas = Pasta::where('status', 1)
                    ->where(function($q) {
                        $q->where('end_date', '>', new DateTime())
                        ->orWhere('end_date', null);
                    })
                    ->orderBy('create_date', 'desc')
                    ->take(10)
                    ->get();
        
        return $pastas;
    }

    private function setEndTime($time, Carbon $date)
    {
        $createDate = $date->clone();

        switch($time)
        {
            case 1:
                $createDate->addMinutes(10);
                return $createDate->toDateTimeString();
            case 2:
                $createDate->addHour();
                return $createDate->toDateTimeString();
            case 3:
                $createDate->addHours(3);
                return $createDate->toDateTimeString();
            case 4:
                $createDate->addDay();
                return $createDate->toDateTimeString();
            case 5:
                $createDate->addWeek();
                return $createDate->toDateTimeString();
            case 6:
                $createDate->addMonth();
                return $createDate->toDateTimeString();
            case 7:
                return null;
            default:
                return null;
        }
    }

    private function generateUniqHash()
    {
        while(true)
        {
            $hash = md5(uniqid(rand(), true));
            $pasta = Pasta::where('hash', $hash)->first();

            if($pasta == null)
        break;
        }

        return $hash;
    }
}
