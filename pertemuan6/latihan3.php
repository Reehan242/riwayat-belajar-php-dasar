<?php
$game_portfolio = [
    [
        "name" => "Brick Crusher",
        "project_type" => "Solo Project",
        "tools" => "Game Maker Studio 2",
        "waktu" =>  "2 Weeks",
        "date_start" => "24 November 2022",
        "date_finish" => "12 December 2022",
        "image" => "brick_crusher.png"
    ],
    [
        "name" => "The Only Hero!",
        "project_type" => "Solo Project",
        "tools" => "Godot Engine 3.5",
        "waktu" =>  "3 Months",
        "date_start" => "4 April 2023",
        "date_finish" => "11 July 2023",
        "image" => "the_only_hero.png"
    ],
    [
        "name" => "Virtual Pinball",
        "project_type" => "Solo Project",
        "tools" => "Unity",
        "waktu" =>  "1 Week",
        "date_start" => "22 August 2023",
        "date_finish" => "27 August 2023",
        "image" => "virtual_pinball.png"
    ],
    [
        "name" => "Guild Rush",
        "project_type" => "Team Project",
        "tools" => "Unity",
        "waktu" =>  "3 Months 3 Weeks",
        "date_start" => "5 September 2023",
        "date_finish" => "26 December 2023",
        "image" => "guild_rush.png"
    ],
    [
        "name" => "Kisah Monster",
        "project_type" => "Solo Project",
        "tools" => "Unity",
        "waktu" =>  "3 Months",
        "date_start" => "1 May 2024",
        "date_finish" => "28 July 2024",
        "image" => "kisah_monster.png"
    ]
]

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <style>
        .list-none {
            list-style-type: none;
        }
    </style>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
</head>

<body>
    <div>
        <!-- navbar start -->
        <div>

        </div>
        <!-- navbar end -->

        <!-- content start -->
        <div class=" mx-auto text-center mt-3" style="width: 70%;">
            <div class="row">
                <?php foreach ($game_portfolio as $each_data): ?>
                    <div class="card col-sm-6">
                        <img
                            src="img/<?php echo $each_data['image']; ?>"
                            class="img-thumbnail"
                            alt="gambar game portfolio" />
                        <div class="card-body">
                            <h5 class="card-title"><?= $each_data["name"]; ?></h5>
                            <p class="card-text">
                                Project Type :<?= $each_data["project_type"]; ?> <br>
                                Development Tools :<?= $each_data["tools"]; ?> <br>
                                Development Time :<?= $each_data["waktu"]; ?> <br>
                                Date Start :<?= $each_data["date_start"]; ?> <br>
                                Date Finish :<?= $each_data["date_finish"]; ?>
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <!-- content end -->
            <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
</body>

</html>