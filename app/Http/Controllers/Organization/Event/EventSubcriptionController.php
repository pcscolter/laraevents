<?php

namespace App\Http\Controllers\Organization\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Services\EventService;

class EventSubcriptionController extends Controller
{
    public function store(Event $event, Request $request){
        $user= User::findOrFail($request->user_id);


        if(EventService::userSubscribedOnEvent($user, $event)){
            return back()->with('warning', 'Este participante já está inscrito no evento');
        }


        if(EventService::eventEndDateHasPassed($event)){
            return back()->with('warning', 'Operação inválida! o evento já ocorreu!');
        }

        if(EventService::eventParticipantLimitHasReached($event)){
            return back()->with('warning', 'Não é possível se inscrever no evento pois foi alcançado o limite de participantes');
        }

        $user->events()->attach($event->id);


        return back()->with('success', 'Inscrição no evento realizada com sucesso');
    }

    public function destroy(Event $event, User $user)
    {
        if(EventService::eventEndDateHasPassed($event)){
            return back()->with('warning', 'Operação inválida! o evento já ocorreu!');
        }

        if(!EventService::userSubscribedOnEvent($user, $event)){
            return back()->with('warning', 'O participante não está inscrito no evento');
        }

        $user->events()->detach($event->id);

        return back()->with('success', 'Inscrição no evento removida com sucesso');
    }
}
