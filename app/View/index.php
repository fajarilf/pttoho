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
                <div class="rounded-3" id="statusa" style="width: 7rem; height: 7rem">
                    <h3 class="text-center">A</h3>
                </div>
                <div class="rounded-3" id="statusb" style="width: 7rem; height: 7rem">
                    <h3 class="text-center">B</h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getData(){
            $.ajax({
                type: "GET",
                url: "/data",
                success: function(response){
                    var data = JSON.parse(response)

                    document.getElementById("humidity").innerText = data.humidity
                    document.getElementById("temperature").innerText = data.temperature

                    if(data.status_a == true){
                        document.getElementById("statusa").classList.add("bg-success");
                        document.getElementById("statusa").classList.remove("bg-danger");
                    }else{
                        document.getElementById("statusa").classList.add("bg-danger");
                        document.getElementById("statusa").classList.remove("bg-success");
                    }

                    if(data.status_b == true){
                        document.getElementById("statusb").classList.add("bg-success");
                        document.getElementById("statusb").classList.remove("bg-danger");
                    }else{
                        document.getElementById("statusb").classList.add("bg-danger");
                        document.getElementById("statusb").classList.remove("bg-success");
                    }
                }
            })
        }

        setInterval(() => {
            getData();
        }, 1000);

    </script>

    <div class="text-center">
        <h1>TABLE</h1>
    </div>

    <div class="container d-flex justify-content-center gap-4">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/?filter=default">default</a></li>
                <li><a class="dropdown-item" href="/?filter=statusa_true">status a = true</a></li>
                <li><a class="dropdown-item" href="/?filter=statusa_false">status a = false</a></li>
                <li><a class="dropdown-item" href="/?filter=statusb_true">status b = true</a></li>
                <li><a class="dropdown-item" href="/?filter=statusb_false">status b = false</a></li>
            </ul>
        </div>
        <div class="tombol">
            <button class="btn btn-primary">
                <a href="/table/download" class="link-light link-underline-opacity-0">Export CSV</a>
            </button>
        </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</html>