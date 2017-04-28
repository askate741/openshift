<div id="bigc">
    <div class="holder back">
        <div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
    </div>
    <div class="holder front">
        <div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
    </div>
</div>
<div id="demo">
<span  style="white-space:pre"></span></div>
<style>

</style>
<style>
   html{
        font-size: 1.2vh;
    }

    body {
        height: 100vh;
        width: 100vw;
        overflow: hidden;
        /*background: -webkit-linear-gradient(white, #e0d1d1);*/
        /*background: linear-gradient(white, #e0d1d1);*/
        background: url(img/sky.jpg)center center / cover;
        /*box-shadow: inset 0 5vh 30vh 5vh #d6c2c2;*/
        /*box-shadow: inset 0 5vh 30vh 5vh #5bc0de;*/
        font-family: "Share Tech Mono", monospace;
        /*color: white;*/
        font-size: 2rem;
    }

    body:after {
        z-index: 1;
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: -webkit-radial-gradient(circle, #ffffff 40%, #e0d1d1);
        background-image: radial-gradient(circle, #ffffff 40%, #e0d1d1);
        -webkit-transform-origin: 50% 100%;
        transform-origin: 50% 100%;
        -webkit-transform: scaleY(1.5) scaleX(1);
        transform: scaleY(1.5) scaleX(1);
        opacity: 0.5;
    }

    .balloon {
        top: 100vh;
        opacity: 0.95;
        position: absolute;
        -webkit-transform: translate3d(-50%, -50%, 0);
        transform: translate3d(-50%, -50%, 0);
        width: 10rem;
        height: 10rem;
        background: #faf9f9;
        border-radius: 10rem 10rem 4rem 10rem;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        box-shadow: inset -0.5rem -0.5rem 5rem -0.5rem #c99c9c, 3rem 3rem 1.5rem rgba(153, 102, 102, 0.2);
        -webkit-animation: float1 10s infinite ease-out;
        animation: float1 10s infinite ease-out;
    }

    @-webkit-keyframes float1 {
        0% {
            -webkit-transform: rotate(40deg) translateY(0) translateX(0);
            transform: rotate(40deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: rotate(50deg) translateY(-85vh) translateX(-85vh);
            transform: rotate(50deg) translateY(-85vh) translateX(-85vh);
        }
    }

    @keyframes float1 {
        0% {
            -webkit-transform: rotate(40deg) translateY(0) translateX(0);
            transform: rotate(40deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: rotate(50deg) translateY(-85vh) translateX(-85vh);
            transform: rotate(50deg) translateY(-85vh) translateX(-85vh);
        }
    }

    @-webkit-keyframes float2 {
        0% {
            -webkit-transform: rotate(55deg) translateY(0) translateX(0);
            transform: rotate(55deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: rotate(45deg) translateY(-85vh) translateX(-85vh);
            transform: rotate(45deg) translateY(-85vh) translateX(-85vh);
        }
    }

    @keyframes float2 {
        0% {
            -webkit-transform: rotate(55deg) translateY(0) translateX(0);
            transform: rotate(55deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: rotate(45deg) translateY(-85vh) translateX(-85vh);
            transform: rotate(45deg) translateY(-85vh) translateX(-85vh);
        }
    }

    @-webkit-keyframes float3 {
        0% {
            -webkit-transform: rotate(45deg) translateY(0) translateX(0);
            transform: rotate(45deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: rotate(35deg) translateY(-85vh) translateX(-85vh);
            transform: rotate(35deg) translateY(-85vh) translateX(-85vh);
        }
    }

    @keyframes float3 {
        0% {
            -webkit-transform: rotate(45deg) translateY(0) translateX(0);
            transform: rotate(45deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: rotate(35deg) translateY(-85vh) translateX(-85vh);
            transform: rotate(35deg) translateY(-85vh) translateX(-85vh);
        }
    }

    @-webkit-keyframes floatfront1 {
        0% {
            -webkit-transform: scale(1.3) rotate(40deg) translateY(0) translateX(0);
            transform: scale(1.3) rotate(40deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: scale(1.3) rotate(50deg) translateY(-100vh) translateX(-100vh);
            transform: scale(1.3) rotate(50deg) translateY(-100vh) translateX(-100vh);
        }
    }

    @keyframes floatfront1 {
        0% {
            -webkit-transform: scale(1.3) rotate(40deg) translateY(0) translateX(0);
            transform: scale(1.3) rotate(40deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: scale(1.3) rotate(50deg) translateY(-100vh) translateX(-100vh);
            transform: scale(1.3) rotate(50deg) translateY(-100vh) translateX(-100vh);
        }
    }

    @-webkit-keyframes floatfront2 {
        0% {
            -webkit-transform: scale(1.3) rotate(55deg) translateY(0) translateX(0);
            transform: scale(1.3) rotate(55deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: scale(1.3) rotate(45deg) translateY(-100vh) translateX(-85vh);
            transform: scale(1.3) rotate(45deg) translateY(-100vh) translateX(-85vh);
        }
    }

    @keyframes floatfront2 {
        0% {
            -webkit-transform: scale(1.3) rotate(55deg) translateY(0) translateX(0);
            transform: scale(1.3) rotate(55deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: scale(1.3) rotate(45deg) translateY(-100vh) translateX(-85vh);
            transform: scale(1.3) rotate(45deg) translateY(-100vh) translateX(-85vh);
        }
    }

    @-webkit-keyframes floatfront3 {
        0% {
            -webkit-transform: scale(1.3) rotate(45deg) translateY(0) translateX(0);
            transform: scale(1.3) rotate(45deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: scale(1.3) rotate(35deg) translateY(-85vh) translateX(-100vh);
            transform: scale(1.3) rotate(35deg) translateY(-85vh) translateX(-100vh);
        }
    }

    @keyframes floatfront3 {
        0% {
            -webkit-transform: scale(1.3) rotate(45deg) translateY(0) translateX(0);
            transform: scale(1.3) rotate(45deg) translateY(0) translateX(0);
        }
        100% {
            -webkit-transform: scale(1.3) rotate(35deg) translateY(-85vh) translateX(-100vh);
            transform: scale(1.3) rotate(35deg) translateY(-85vh) translateX(-100vh);
        }
    }

    .balloon:after {
        content: '';
        position: absolute;
        bottom: -.05rem;
        right: -.05rem;
        border-top: 0.5rem solid transparent;
        border-bottom: 0.5rem solid transparent;
        border-right: 0.9rem solid #dbbdbd;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        border-radius: 1rem;
    }

    .holder.back {
        position: relative;
        z-index: 2;
    }

    .holder.back .balloon:nth-child(1) {
        left: 50%;
        -webkit-animation: float2 9.5s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: float2 9.5s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 0s;
        animation-delay: 0s;
    }

    .holder.back .balloon:nth-child(2) {
        left: 20%;
        -webkit-animation: float1 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: float1 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 3.2s;
        animation-delay: 3.2s;
    }

    .holder.back .balloon:nth-child(3) {
        left: 90%;
        -webkit-animation: float3 10.5s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: float3 10.5s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 7.7s;
        animation-delay: 7.7s;
    }

    .holder.back .balloon:nth-child(4) {
        left: 70%;
        -webkit-animation: float1 9s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: float1 9s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 1.3s;
        animation-delay: 1.3s;
    }

    .holder.back .balloon:nth-child(5) {
        left: 35%;
        -webkit-animation: float2 10.2s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: float2 10.2s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 5.6s;
        animation-delay: 5.6s;
    }

    .holder.front {
        position: relative;
        z-index: 4;
    }

    .holder.front .balloon {
        box-shadow: inset -0.5rem -0.5rem 5rem -0.5rem #c99c9c, 8rem 8rem 4rem rgba(153, 102, 102, 0.2);
    }

    .holder.front .balloon:nth-child(1) {
        left: 80%;
        -webkit-animation: floatfront1 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: floatfront1 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 2.8s;
        animation-delay: 2.8s;
    }

    .holder.front .balloon:nth-child(2) {
        left: 35%;
        -webkit-animation: floatfront1 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: floatfront1 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 1.4s;
        animation-delay: 1.4s;
    }

    .holder.front .balloon:nth-child(3) {
        left: 7%;
        -webkit-animation: floatfront3 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: floatfront3 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 7.7s;
        animation-delay: 7.7s;
    }

    .holder.front .balloon:nth-child(4) {
        left: 46%;
        -webkit-animation: floatfront2 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: floatfront2 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 6.3s;
        animation-delay: 6.3s;
    }

    .holder.front .balloon:nth-child(5) {
        left: 75%;
        -webkit-animation: floatfront1 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        animation: floatfront1 10s infinite cubic-bezier(0.47, 0, 0.745, 0.715);
        -webkit-animation-delay: 8.9s;
        animation-delay: 8.9s;
    }
</style>