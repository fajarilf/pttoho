<body>
    <div class="text-center">
        <h1>TABLE</h1>
    </div>

    <div class="container d-flex justify-content-center gap-4">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/table?filter=statusa_true">status a = true</a></li>
                <li><a class="dropdown-item" href="/table?filter=statusa_false">status a = false</a></li>
                <li><a class="dropdown-item" href="/table?filter=statusb_true">status b = true</a></li>
                <li><a class="dropdown-item" href="/table?filter=statusb_false">status b = false</a></li>
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

</html>