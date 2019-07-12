<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuoteResource;
use App\Proposers;
use Illuminate\Http\Request;
use App\Students;
use App\Candidates;
use App\FailedCandidates;
use App\Seconders;
use App\Positions;
use Illuminate\Support\Facades\Artisan;
use function MongoDB\BSON\toJSON;
use phpDocumentor\Reflection\Types\Array_;
use App\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        $q = new Quote();
        $q = $q->quote();
        $res = new QuoteResource($q);
return $res;
    }
}
