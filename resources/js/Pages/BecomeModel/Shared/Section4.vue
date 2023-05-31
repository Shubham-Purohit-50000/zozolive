<template>
    <div class="container-fluid text-center incomeBox">
        <h2 class="text-center secondHead">Your potential income</h2>
        <h3 class="text-center sectionsubHead">
            Based on average data in your region
        </h3>

        <div class="incomeBoxdata col-md-8">
            <div class="incomeleft">
                <p class="lefttitle">Favorited by: <span>2,500</span></p>
                <input
                    type="range"
                    class="form-range"
                    min="0"
                    max="5"
                    step="0.5"
                    id="customRange2"
                    style="width: 85%"
                />
                <p class="leftcontent">
                    The more you broadcast, the more viewers add you to
                    Favorites!
                </p>
            </div>
            <div class="incomeright">
                <div class="sum">
                    <span class="firstC">Per hour</span>
                    <p class="d-flex align-item-center"><span class="secC">₹</span> 1000</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>
