@extends('layouts.default')

@section('title')
    Create-topic
@endsection

@section('css')
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="nts/bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="nts/fontawesome/css/all.css">
	<link rel="stylesheet" href="nts/css/createtopic.css">
	<link rel="stylesheet" href="nts/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="nts/owlcarousel/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endsection

@section('body')
    @include('user/modules.createtopic')
@endsection

@section('js')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="nts/bootstrap4/js/jquery-3.3.1.slim.min.js"></script>
    <script src="nts/bootstrap4/js/popper.min.js"></script>
    <script src="nts/bootstrap4/js/bootstrap.min.js"></script>
    <!-- owl-carousel -->
    <!-- <script src="jquery.min.js"></script> -->
    <script src="nts/owlcarousel/owl.carousel.min.js"></script>
    <script src="nts/jquery.counterup.min.js"></script>
    <script src="nts/jquery.waypoints.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        var tx = document.getElementsByTagName('textarea');
        for (var i = 0; i < tx.length; i++) {
            tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
            tx[i].addEventListener("input", OnInput, false);
        }

        function OnInput() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        }
    </script>

    <script type="text/javascript">
        document.querySelector('.title_zone').onclick = function() {
            var khoi = document.querySelectorAll(".one_zone");
            // click vào cái đã hiển thị rồi
            if(this.classList[1] === "zone_active") {

            }
            else {
                // bỏ hết shadow
                for(var j = 0; j < khoi.length; j++){
                    khoi[j].classList.remove("zone_active");
                }
                // đối tượng được click thành shadow
                this.classList.toggle("zone_active");
            }
        }
    </script>


    <script src="nts/js/createtopic.js"></script>  
@endsection