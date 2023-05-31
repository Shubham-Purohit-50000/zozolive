<template>
    <UserLayout>
      <section>
    <div style="margin-bottom: 1rem;">
        <h3>
            Earnings
        </h3>
        <p>
            Here you can find detailed stats of your earnings to keep track of your personal performance. Analyze how users respond to your content and lead your income to even more growth.
        </p>
        <ul>
            <li>Payouts are executed <span style="color: #e2b505;"> automatically every Tuesday.</span> International Wire Transfers are executed every other Tuesday.</li>
            <li>A payout is scheduled once you reach the minimum amount you have chosen.</li>
            <li>The sum of a payout gets fixed overnight into Monday (at 12 AM UTC on Monday). Anything you earn after that goes into your next payout.</li>
        </ul>
        <button
            type="text"
            style="
                background-color: #888;
                color: white;
                border-radius: 3rem;
                height: 2rem;
                padding: 0px 1rem;

                border: 1px solid transparent;
                text-align: center;
            "
        >
            Learn more about payouts
        </button>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" role="tab" aria-controls="nav-home" aria-selected="true">Token History</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false">Paying user</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div style="display: flex; margin-top: 1.5rem; margin-bottom: 1rem; justify-content: space-between;">
                <div><span style="font-size: 1.3rem;"> Token History for last 30 days |</span><span style="color: #38cd4c;"> 2376 tk / $1 163</span></div>
                <div>
                    <input placeholder="Last 30 days" class="inputBox1" type="text" onfocus="(this.type = 'date')" id="date" />
                </div>
            </div>
            <div class="table-responsive"> 
            <table class="table table-dark table-striped" style="color: #888888;">
                <thead>
                    <th>Users</th>
                    <th>Start Date</th>
                    <th>type</th>
                    <th>Token</th>
                    <th>Duration</th>
                </thead>
                <tbody  v-for="calllog in calllogs">
                    <tr>
                        <td>{{calllog.user.name}}</td>
                        <td>{{calllog.start_time}}</td>
                        <td>Video Call</td>

                        <td>{{calllog.host_token.type_coin}}</td>
                        <td>{{calllog.host_token.duration}}</td>

                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">..hello.</div>
    </div>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div style="display: flex; margin-top: 1.5rem; margin-bottom: 1rem; justify-content: space-between;">
                <div><span style="font-size: 1.3rem;"> Paying User for Lifetime</span></div>
                <div>
                <i class="bi bi-clock-fill"></i>  <span style="margin-right:10px"> statistics updates every 1 hour</span> 
                    <input placeholder="Lifetime " class="inputBox1" type="text" onfocus="(this.type = 'date')" id="date" />
                </div>
            </div>
            <div class="table-responsive"> 
            <table class="table table-dark table-striped" style="color: #888888;">
                <thead>
                    <th>Users</th>
                    <th>LAST PAID</th>
                    <th>PUBLIC TIPS</th>
                    <th>PRIVATE</th>
                    <th>EXCLUSIVE PRIVATE</th>
                    <th>SPY MODE</th>
                    <th>GROUP SHOW</th>
                    <th>CONTENT</th>
                    <th>fAN CLUB</th>
                    <th>TOTAL TOKEN</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>1</td>
                     
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>3</td>
                        <td>3</td>
                        <td>3</td>
                        <td>2</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">..hello.</div>
    </div>
</section>
    </UserLayout>
</template>

<script>
import UserLayout from "@/Layouts/UserLayout.vue";
export default {
    components: { UserLayout },
    props: ['calllogs'],
};
</script>

<style>
.inputBox1 {
        border-radius: 20px;
        background-color: black;
        height: 35px;
        padding: 0 10px;
        border: 2px solid white;
        color: white;
    }
</style>
