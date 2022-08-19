<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;


    // $table->id();
    // $table->string('name');
    // $table->string('speaker_name');
    // $table->dateTime('start_date');
    // $table->dateTime('end_date');
    // $table->text('target_audience');
    // $table->integer('participant_limit');
    protected $fillable = [
        'name',
        'speaker_name',
        'start_date',
        'end_date',
        'target_audience',
        'participant_limit'
    ];
}
