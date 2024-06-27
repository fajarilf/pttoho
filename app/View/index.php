<body>
    <div class="d-flex align-items-center py-3 bg-dark">
        <div class="ms-3 text-white">
            <h3>
                <?= $model["title"] ?>
            </h3>
        </div>
    </div>
    <div class="d-flex justify-content-center my-3">
        <div class="bg-dark rounded-3 my-auto mx-3" style="width: 13rem; height: 12rem">
            <div class="text-white text-center">
                <h4>HUMIDITY</h4>
                <h1 class="mt-5" id="humidity">
                    <?= $model["humidity"] ?>
                </h1>
            </div>
        </div>
        <div class="bg-dark rounded-3 my-auto mx-3" style="width: 13rem; height: 12rem">
            <div class="text-white text-center">
                <h4>TEMPERATURE</h4>
                <h1 class="mt-5" id="temperature">
                    <?= $model["temperature"] ?>
                </h1>
            </div>
        </div>
        <div class="bg-dark rounded-3 my-auto mx-3" style="width: 26rem; height: 12rem">
            <div class="text-white text-center">
                <h4>STATUS</h4>
            </div>
            <div class="d-flex align-items-center justify-content-evenly w-100 h-75">
                <?php if($model["status"]["a"] == true): ?>
                    <div class="bg-success rounded-3" style="width: 7rem; height: 7rem">
                        <h3 class="text-center">A</h3>
                    </div>
                <?php else: ?>
                    <div class="bg-danger rounded-3" style="width: 7rem; height: 7rem">
                        <h3 class="text-center">A</h3>
                    </div>
                <?php endif ?>
                <?php if($model["status"]["b"] == true): ?>
                    <div class="bg-success rounded-3" style="width: 7rem; height: 7rem">
                        <h3 class="text-center">B</h3>
                    </div>
                <?php else: ?>
                    <div class="bg-danger rounded-3" style="width: 7rem; height: 7rem">
                        <h3 class="text-center">B</h3>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <!-- <script>
        function getData(){
            $.ajax({
                type: "GET",
                url: "/",
                data: "",
                success: function(){
                    console.log("success");
                }
            })
        }

        setInterval(() => {
            getData();
        }, 5000);

    </script> -->

    <div class="text-center">
        <h1>TABLE</h1>
    </div>

    <div class="container w-50 border rounded my-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Humidity</th>
                    <th scope="col">Temperature</th>
                    <th scope="col">
                        <a href="/table?sort=statusa" class="link-dark link-underline-opacity-0">status_a</a>
                    </th>
                    <th scope="col">
                        <a href="/table?sort=statusb" class="link-dark link-underline-opacity-0">status_b</a>
                    </th>
                    <th scope="col">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < sizeof($model["datas"]["humidity"]); $i++): ?>
                    <tr>
                        <td><?= $model["datas"]["humidity"][$i] ?></td>
                        <td><?= $model["datas"]["temperature"][$i] ?></td>
                        <td><?= $model["datas"]["status_a"][$i] ?></td>
                        <td><?= $model["datas"]["status_b"][$i] ?></td>
                        <td><?= $model["datas"]["date_time"][$i] ?></td>
                    </tr>
                <?php endfor ?>
            </tbody>
        </table>
    </div>
</body>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->

</html>