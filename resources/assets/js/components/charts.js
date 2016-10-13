(
    function () {
        var visualizationsChart = document.getElementById("visualizations-chart"),
            interactionsChart = document.getElementById("interactions-chart");

        /**
         * Maneira suja de verificar se estamos na página dos
         * relatórios.
         */
        if (!visualizationsChart || !interactionsChart) {
            return;
        }

        new Chart(visualizationsChart, {
            type: 'doughnut',
            data: {
                labels: [
                    "Visualizada",
                    "Não Visualizada"
                ],
                datasets: [
                    {
                        data: [43, 57],
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB"
                        ],
                        hoverBackgroundColor: [
                            "#FF6384",
                            "#36A2EB"
                        ]
                    }
                ]
            }
        });

        new Chart(interactionsChart, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: 'Curtidas',
                        data: [1, 1, 1, 2, 2, 4, 6]
                    },
                    {
                        label: 'Idéias',
                        data: [1, 2, 3, 4, 5, 6, 7]
                    }
                ]
            }
        });
    }
)();