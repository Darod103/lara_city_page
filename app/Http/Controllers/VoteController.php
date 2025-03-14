<?php

namespace App\Http\Controllers;

use App\Services\VoteServices;


class VoteController extends Controller
{
    private VoteServices $voteServices;

    public function __construct()
    {
        $this->voteServices = new VoteServices();
    }

    public function store($id)
    {
        return $this->voteServices->storeVote($id);
    }

}
