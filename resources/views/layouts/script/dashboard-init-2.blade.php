<script type="text/javascript">
    //* Annonces en attente :
    @if (!is_null($annnoncesAttente) && $annnoncesAttente->count() > 0)
        //* Répartition des Commandes par Statut [en cours, annulée, validée]
        options = {
            series: [
                @foreach ($annnoncesAttente as $row)
                    {{ $row->count }},
                @endforeach
            ],
            chart: {
                type: "donut",
                height: 350
            },
            labels: [
                @foreach ($annnoncesAttente as $row)
                    "{{ Helpers::legend($row->statut)['text'] }}",
                @endforeach
            ],
            colors: [
                @foreach ($annnoncesAttente as $key => $row)
                    "{{ Helpers::legend($row->statut)['color'] }}",
                @endforeach
            ],
            legend: {
                show: !1
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "50%"
                    }
                }
            },
        };
        (chart = new ApexCharts(
            document.querySelector("#donut-chart"),
            options
        )).render();
    @endif


    // CXourbe d'écolution des visites :
    @if(!is_null($courbeAnnonces) && $courbeAnnonces->count() > 0)
    var options = {
            series: [{
                name: "Annonce postées ",
                data: [
                    //@if($courbeAnnonces->count() === 1)
                        @foreach ($courbeAnnonces as $row)
                            {{ $row->count }},
                        @endforeach
                        //0,0,0,0,0,0,0,0,0,0,0
                    //@endif

                    // @if($courbeAnnonces->count() === 2)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,0,0,0,0,0,0,0,0
                    // @endif

                    // @if($courbeAnnonces->count() === 3)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,0,0,0,0,0,0,0,
                    // @endif

                    // @if($courbeAnnonces->count() === 4)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,0,0,0,0,0,0,
                    // @endif

                    // @if($courbeAnnonces->count() === 5)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,0,0,0,0,0,
                    // @endif

                    // @if($courbeAnnonces->count() === 6)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,0,0,0,0,
                    // @endif

                    // @if($courbeAnnonces->count() === 7)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,0,0,0,
                    // @endif

                    // @if($courbeAnnonces->count() === 8)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,0,0,
                    // @endif

                    // @if($courbeAnnonces->count() === 9)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,0,
                    // @endif

                    // @if($courbeAnnonces->count() === 10)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,0,
                    // @endif

                    // @if($courbeAnnonces->count() === 11)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    //     0,
                    // @endif

                    // @if($courbeAnnonces->count() === 12)
                    //     @foreach ($courbeAnnonces as $row)
                    //         {{ $row->count }},
                    //     @endforeach
                    // @endif
            ],
            }],
            chart: {
                height: 350,
                type: "area",
                toolbar: {
                    show: !1
                }
            },
            colors: ["#556ee6", "#f1b44c"],
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth",
                width: 3
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 2,
                    inverseColors: !1,
                    opacityFrom: .45,
                    opacityTo: .05,
                    stops: [20, 100, 100, 100]
                }
            },
            xaxis: {
                categories: ["Jan", "Fév", "Mars", "Avr", "Mai", "Juin", "Jui", "Août", "Sep", "Oct", "Nov", "Déc"]
            },
            markers: {
                size: 3,
                strokeWidth: 3,
                hover: {
                    size: 4,
                    sizeOffset: 2
                }
            },
            legend: {
                position: "top",
                horizontalAlign: "right"
            }
        },
        chart = new ApexCharts(document.querySelector("#area-chart"), options);
    chart.render();

    @endif
</script>
