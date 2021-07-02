<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <passportclients></passportclients>
                <passportauthorizedclients></passportauthorizedclients>
                <passportpersonalaccesstokens></passportpersonalaccesstokens>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
