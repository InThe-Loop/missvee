@extends('layouts.app')
@section('title', 'About us')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 p-4">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
            <h3 class="lead text-dark mt-5">About us</h3>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('images/about.jpg') }}" class="about" alt="MissVee" />
                </div>
                <div class="col-md-9">
                    <p>
                        MissVee is a local brand established in 2018, founded by a hardworking
                        womam - Vanessa Nkhethoa Tsotetsi - a wife and mother of 4 children who was
                        born and raised in ETWATWA, BENONI. She is a devout Christian and a founder of 
                        a foundation called MissVee Gracious God's Foundation.
                    </p>
                    <p>
                        She's a fashion designer. Her passion for fashion drove her into opening an online
                        store dealing exclusively with evening wear. She decided to approch a new career
                        in modelling for big clothing brands and billboard adverts.
                    </p>
                    <p>
                        Vanessa studied social working and later on studied marketing and management
                        as the course is helping her to manage her own businesses in terms of advertising,
                        sales and finances.
                    </p>
                    <p>
                        She aims to create jobs out of MissVee online store which are; modelling,
                        photography and beauty technician careers to work with her at her fashion main house.
                    </p>
                    <p>
                        Vanessa is also a director at her husband's IT company
                        (InTheLoop Software Solutions). She also owns a food service company
                        named MissVee Tropical Salads; published a cooking book and an
                        autobiograpghy in 2021. Vanessa's favourite quotes: 
                    </p>
                    <p>
                        <small><em>
                            - "Put God first in everything" - Matthew 6, verse 33<br/>
                            - "Failure is not the opposite of success, it's part of success."
                        </em></small>
                    </p>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
