<?php

//require_once('/var/www/dnd_creator/dnd_creator/resources/api_modules/api_functions.blade.php');
?>
<x-app>
    <x-dashboard_sidebar>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-transparent text-primary bg-dark">
                        <div class="card-header">{{ __('My Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <?php
                            //                        require_once('/var/www/dnd_creator/dnd_creator/resources/api_modules/api_functions.php');
                            //
                            //                        $output = curl_request();
                            //                        print_r($output);
                            //                    echo $output;
                            ?>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </x-dashboard_sidebar>
</x-app>