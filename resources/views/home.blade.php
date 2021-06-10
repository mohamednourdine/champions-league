@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto bg-fixture text-light rounded pb-4">
            <div id="fixture-main">
                <div id="header">
                    <div class="bg-title p-3 animate__animated animate__bounceInLeft">
                        <h1 class="h4 my-auto text-darkblue font-fredoka">Champions League Simulation</h1>
                    </div>
                    <div
                        class="bg-description w-auto p-3 py-2 animate__animated animate__flipInX animate__delay-1s">
                        <h2 class="h5 my-auto text-blue font-rowdies">GAME FIXTURES</h2>
                    </div>
                </div>
                <!-- WEEKS / SMALL DEVICE -->
                <div id="mobile-weeks">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a class="btn btn-sm btn-lightblue dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                WEEKS
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark weeks-dropdown"
                                aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item active" href="#">1</a></li>
                                <li><a class="dropdown-item" href="#">2</a></li>
                                <li><a class="dropdown-item" href="#">3</a></li>
                                <li><a class="dropdown-item" href="#">4</a></li>
                                <li><a class="dropdown-item" href="#">5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ---------- -->
                <div class="row mt-3">
                    <div id="fixtures-col" class="col-md-10">
                        <!-- FIXTURES COL -->
                        <div class="accordion" id="fixtureaccordion">

                            {{-- 1 st Week Matches --}}

                            <div class="daytitle">1st Week Matches</div>
                            <!-- FINISHED MATCHES -> btn-accordion-finished -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="btn btn-accordion-finished collapsed font-rowdies w-100"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                        aria-expanded="false" aria-controls="collapse1">
                                        <div class="row">
                                            <div class="col">LIVERPOOL</div>
                                            <div class="col-auto"><span class="badge border mx-2">1 - 1</span>
                                            </div>
                                            <div class="col">ARSENAL</div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse"
                                    aria-labelledby="heading1" data-bs-parent="#fixtureaccordion">
                                    <div class="accordion-body">
                                        <div class="badge bg-finished rounded-bottom"><small>FULL TIME</small>
                                        </div>
                                        <div class="accordion-content">
                                            <div class="row small">
                                                <div class="col"></div>
                                                <div class="col-auto"><span
                                                        class="fas fa-futbol"></span>&nbsp;17'</div>
                                                <div class="col">Aubameyang</div>
                                            </div>
                                            <div class="row small">
                                                <div class="col">Ozan Kabak</div>
                                                <div class="col-auto"><span class="yellow-card"></span>&nbsp;24'
                                                </div>
                                                <div class="col"></div>
                                            </div>
                                            <div class="row small">
                                                <div class="col">Mohamed Salah</div>
                                                <div class="col-auto"><span
                                                        class="fas fa-futbol"></span>&nbsp;36'</div>
                                                <div class="col"></div>
                                            </div>
                                            <div class="row small">
                                                <div class="col"></div>
                                                <div class="col-auto"><span class="red-card"></span>&nbsp;67'
                                                </div>
                                                <div class="col">David Luiz</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- LIVE MATCHES -> btn-accordion-live -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="btn btn-accordion-live collapsed font-rowdies w-100"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                        aria-expanded="false" aria-controls="collapse2">
                                        <div class="row">
                                            <div class="col">MAN. UNITED</div>
                                            <div class="col-auto"><span class="badge border mx-2">2 - 0</span>
                                            </div>
                                            <div class="col">MAN. CITY</div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse"
                                    aria-labelledby="heading2" data-bs-parent="#fixtureaccordion">
                                    <div class="accordion-body">
                                        <span class="badge rounded-bottom btn-accordion-live">LIVE 67'</span>
                                        <div class="accordion-content">
                                            <div class="row small">
                                                <div class="col">M. Rashford</div>
                                                <div class="col-auto"><span
                                                        class="fas fa-futbol"></span>&nbsp;14'</div>
                                                <div class="col"></div>
                                            </div>
                                            <div class="row small">
                                                <div class="col"></div>
                                                <div class="col-auto"><span class="yellow-card"></span>&nbsp;26'
                                                </div>
                                                <div class="col">De Bruyne</div>
                                            </div>
                                            <div class="row small">
                                                <div class="col">M. Rashford</div>
                                                <div class="col-auto"><span
                                                        class="fas fa-futbol"></span>&nbsp;49'</div>
                                                <div class="col"></div>
                                            </div>
                                            <div class="row small">
                                                <div class="col"></div>
                                                <div class="col-auto"><span
                                                        class="fas fa-exchange-alt"></span>&nbsp;67'</div>
                                                <div class="col">
                                                    <span class="fas fa-long-arrow-alt-down"></span> De Bruyne
                                                    <br>
                                                    <span class="fas fa-long-arrow-alt-up"></span> R. Sterling
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- 2 nd Week Matches --}}


                            <div class="daytitle">2nd Week Matches</div>
                            <!-- UPCOMING MATCHES -> btn-accordion (DEFAULT) -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="btn btn-accordion collapsed font-rowdies w-100" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse3"
                                        aria-expanded="false" aria-controls="collapse3">
                                        <div class="row">
                                            <div class="col">CHELSEA</div>
                                            <div class="col-auto"><span class="badge border mx-2">16:00</span>
                                            </div>
                                            <div class="col">TOTTENHAM</div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse"
                                    aria-labelledby="heading3" data-bs-parent="#fixtureaccordion">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <div class="row small">
                                                <div class="col"><i class="fas fa-map-marker-alt"></i> STAMFORD
                                                    B.</div>
                                                <div class="col-auto"><i class="fas fa-hand-paper"></i> MIKE
                                                    DEAN</div>
                                                <div class="col"><i class="fas fa-cloud-sun-rain"></i> RAINY
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="btn btn-accordion collapsed font-rowdies w-100" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse4"
                                        aria-expanded="false" aria-controls="collapse4">
                                        <div class="row">
                                            <div class="col">LEICESTER</div>
                                            <div class="col-auto"><span class="badge border mx-2">17:45</span>
                                            </div>
                                            <div class="col">EVERTON</div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse"
                                    aria-labelledby="heading4" data-bs-parent="#fixtureaccordion">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <div class="row small">
                                                <div class="col"><i class="fas fa-map-marker-alt"></i> KING
                                                    POWER ST.</div>
                                                <div class="col-auto"><i class="fas fa-hand-paper"></i> LEE
                                                    MASON</div>
                                                <div class="col"><i class="fas fa-cloud"></i> CLOUDY</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- 3rd Week Matches --}}

                            <div class="daytitle">3rd Week Matches</div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading6">
                                    <button class="btn btn-accordion collapsed font-rowdies w-100" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse6"
                                        aria-expanded="false" aria-controls="collapse6">
                                        <div class="row">
                                            <div class="col">SOUTHAMPTON</div>
                                            <div class="col-auto"><span class="badge border mx-2">18:30</span>
                                            </div>
                                            <div class="col">SHEFFIELD UTD.</div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse6" class="accordion-collapse collapse"
                                    aria-labelledby="heading6" data-bs-parent="#fixtureaccordion">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <div class="row small">
                                                <div class="col"><i class="fas fa-map-marker-alt"></i> ST.
                                                    MARY'S</div>
                                                <div class="col-auto"><i class="fas fa-hand-paper"></i> KEVIN
                                                    FRIEND</div>
                                                <div class="col"><i class="fas fa-smog"></i> FOGGY</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="btn btn-accordion collapsed font-rowdies w-100" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse4"
                                        aria-expanded="false" aria-controls="collapse4">
                                        <div class="row">
                                            <div class="col">LEICESTER</div>
                                            <div class="col-auto"><span class="badge border mx-2">17:45</span>
                                            </div>
                                            <div class="col">EVERTON</div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse"
                                    aria-labelledby="heading4" data-bs-parent="#fixtureaccordion">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <div class="row small">
                                                <div class="col"><i class="fas fa-map-marker-alt"></i> KING
                                                    POWER ST.</div>
                                                <div class="col-auto"><i class="fas fa-hand-paper"></i> LEE
                                                    MASON</div>
                                                <div class="col"><i class="fas fa-cloud"></i> CLOUDY</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- WEEKS / BIG DEVICE -->
                    <div id="normal-weeks" class="col-md-2">
                        <!-- WEEKS COL -->
                        <div class="weeks-nav text-center">
                            <span class="badge" id="weeksup"><i class="fas fa-chevron-up"></i></span>
                            <span class="badge" id="weeksdown"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="weeks-title">SIMULATE WEEKS GAMES</div>


                        <button class="btn btn-success simulate-all-weeks">
                            <i class="fas fa-globe"></i> Simulate All Weeks
                        </button>

                        <div id="weeks-col">
                            <div class="weeks">
                                <div class="week week-active">1. Week Play</div>
                                <div class="week">2. Week Play</div>
                                <div class="week">3. Week Play</div>
                                <div class="week">4. Week Play</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection
