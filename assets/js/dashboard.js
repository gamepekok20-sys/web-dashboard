const salesCanvas =
    document.getElementById('salesChart');

if (salesCanvas) {

    new Chart(salesCanvas, {

        type: 'line',

        data: {

            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],

            datasets: [

                {
                    label: 'Revenue',

                    data: [
                        120,
                        150,
                        180,
                        160,
                        220,
                        250,
                        280,
                        300,
                        275,
                        320,
                        350,
                        390
                    ],

                    borderWidth: 3,

                    tension: 0.4
                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false

        }

    });

}


const categoryCanvas =
    document.getElementById('categoryChart');

if (categoryCanvas) {

    new Chart(categoryCanvas, {

        type: 'doughnut',

        data: {

            labels: [
                'Technology',
                'Finance',
                'Service',
                'Other'
            ],

            datasets: [

                {
                    data: [
                        35,
                        25,
                        25,
                        15
                    ]
                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false

        }

    });

}