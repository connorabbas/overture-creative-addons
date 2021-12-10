<div id="page-loader-area" class="text-center row align-items-center">
    <div class="col text-center">
        <div class="lds-dual-ring"></div>
    </div>
</div>
<style>
    .lds-dual-ring {
    display: inline-block;
    width: 80px;
    height: 80px;
    }
    .lds-dual-ring:after {
    content: " ";
    display: block;
    width: 64px;
    height: 64px;
    margin: 8px;
    border-radius: 50%;
    border: 6px solid <?php echo $loaderColor; ?>;
    border-color: <?php echo $loaderColor; ?> transparent <?php echo $loaderColor; ?> transparent;
    animation: lds-dual-ring 1.2s linear infinite;
    }
    @keyframes lds-dual-ring {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }

    #page-loader-area{
        background-color: <?php echo $loaderBackground; ?>;
    }
</style>