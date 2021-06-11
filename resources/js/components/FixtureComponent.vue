<template>
    <span>
    <div class="row">
        <div class="col-md-10 mx-auto bg-fixture text-light rounded pb-4">
            <div id="fixture-main">
                <div id="header">
                    <div class="bg-title p-3 animate__animated animate__bounceInLeft">
                        <h1 class="h4 my-auto text-darkblue font-fredoka">Champions League Simulation</h1>
                    </div>

                    <div class="row standings-box">
                        <div class="col-md-12">
                            <div
                                class="bg-description w-auto p-3 py-2 animate__animated animate__flipInX animate__delay-1s">
                                <h2 class="h5 my-auto text-blue font-rowdies">Standing Results</h2>
                            </div>
                            <div class="table-responsive animate__animated animate__flipInX animate__delay-1s">
                                <table id="standings-table" class="table table-bordred table-striped">
                                    <thead>
                                        <th>Teams</th>
                                        <th>P</th>
                                        <th>W</th>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>GD</th>
                                        <th>PTS</th>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item) in JSON.parse(standingsData)" :key="item.id">
                                            <td>
                                                <img v-bind:src="'/assets/img/teams/' + item.logo" height="20"/>  {{ item.name }}
                                            </td>
                                            <td> {{ item.played }} </td>
                                            <td> {{ item.won }} </td>
                                            <td> {{ item.drawn }} </td>
                                            <td> {{ item.lose }} </td>
                                            <td> {{ item.goal_drawn }} </td>
                                            <td> {{ item.points }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div
                        class="bg-description w-auto p-3 py-2 animate__animated animate__flipInX animate__delay-2s">
                        <h2 class="h5 my-auto text-blue font-rowdies">Game Fixtures</h2>

                    </div>
                    <div class="form-check form-switch pt-2 animate__animated animate__flipInX animate__delay-2s">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" v-model="home_team_favor" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Favor teams playing at home</label>
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
                                <li v-for="(item) in JSON.parse(weeksData)" :key="item.id" class="week">
                                    <a class="dropdown-item" href="#" v-on:click="simulateWeekGame(item.id)" v-if="!JSON.parse(matchesData)[item.id][0].match_status">{{ item.title }} Play</a>
                                    <a class="dropdown-item" href="#" v-else>Played</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ---------- -->
                <div class="row mt-3">
                    <div id="fixtures-col" class="col-md-10">
                        <!-- FIXTURES COL -->
                        <div class="accordion" id="fixtureaccordion">

                             <span  v-for="(item) in JSON.parse(weeksData)" :key="item.id">
                                <div class="daytitle">{{ item.title }} Matches</div>
                                <div class="accordion-item"  v-if="matches">

                                    <span v-for="(match) in JSON.parse(matchesData)[item.id]" :key="match.id">

                                        <h2 class="accordion-header" :id="'heading'.match.id">
                                            <button class="btn btn-accordion collapsed font-rowdies w-100" type="button">
                                                <div class="row">
                                                    <div class="col"><img v-bind:src="'/assets/img/teams/' + match.home_logo" height="20"/>  {{ match.home_team_id }} <i class="fas fa-home"></i></div>
                                                    <div class="col-auto"><span class="badge border mx-2" v-if="match.match_status">{{ match.home_team_goals }}</span></div>
                                                    <div class="col-auto"><span class="badge border mx-2">{{ 24 - match.id * 2 }}:30</span></div>
                                                    <div class="col-auto"><span class="badge border mx-2" v-if="match.match_status">{{ match.away_team_goals }}</span></div>
                                                    <div class="col"><img v-bind:src="'/assets/img/teams/' + match.away_logo" height="20"/>  {{ match.away_team_id }} </div>
                                                </div>
                                            </button>
                                        </h2>

                                    </span>

                                </div>
                            </span>




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


                        <button class="btn btn-success simulate-all-weeks" v-on:click="playAllMatches()" v-if="showAllBtn">
                            <i class="fas fa-globe"></i> Simulate All Weeks
                        </button>

                        <button class="btn btn-danger btn-block reset-all-weeks" v-on:click="resetAllMatches(home_team_favor)">
                            <i class="fas fa-globe"></i> Reset All
                        </button>

                        <div id="weeks-col">
                            <div class="weeks">
                               <div  v-for="(item) in JSON.parse(weeksData)" :key="item.id" class="week">
                                   <span v-on:click="simulateWeekGame(item.id)" v-if="!JSON.parse(matchesData)[item.id][0].match_status">{{ item.title }} Play</span>
                                   <span v-else>Played</span>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>



    </div>

    <footer-component/>
    </span>
</template>

<script>
export default {
  components: {},

  props: {
    weeks: null,
    standings: null,
    matches: null,
  },
  data() {
    return {
      standingsData: null,
      weeksData: null,
      matchesData: null,
      showAllBtn: true,
      home_team_favor: true
    };
  },

  methods: {

    resetAllMatches(){
        axios.get("/api/reset-all").then((res) =>{

            this.getNewFixturesStandings();
            this.weeksData = JSON.stringify(res.data.weeks);
            this.matchesData = JSON.stringify(res.data.matches);
            this.showAllBtn = true;

        });
    },

    getNewFixturesStandings(){
        axios.get("/api/standings").then((res) =>{
            this.standingsData = JSON.stringify(res.data);

        });
    },

    getMatchesResults(){
        axios.get("/api/get-matches-results").then((res) =>{
            this.weeksData = JSON.stringify(res.data.weeks);
            this.matchesData = JSON.stringify(res.data.matches);

        });
    },

    simulateWeekGame($week_id){
         axios.get("/api/play-week/" + $week_id).then((res) => {
             this.getNewFixturesStandings();
             this.refreshTable();
            this.showAllBtn = false;

         });
    },

    playAllMatches(){
        axios.get("/api/play-all-weeks").then((res) =>{
            this.refreshTable();
            this.getNewFixturesStandings();
            this.showAllBtn = false;
        });
    },


    refreshTable(){
        axios.get("/api/fixtures").then((res) =>{
            this.weeksData = JSON.stringify(res.data.weeks);
            this.matchesData = JSON.stringify(res.data.items);
        });
    },
    homeTeamFavorUpdate($val){
        console.log($val ? 0 : 1);

        axios.post("/api/settings", {
          home_team_favor: $val
        });
    },

    getFavorStatus(){
        axios.get("/api/get-matches-favpur-status").then((res) =>{
          this.home_team_favor = res.data
        });
    }

  },
    watch: {
    home_team_favor: function (val) {
      this.homeTeamFavorUpdate(val);
    },

  },
  mounted() {
        this.standingsData = this.standings;
        this.weeksData = this.weeks;
        this.matchesData = this.matches;

        this.getFavorStatus();
  },
};
</script>
