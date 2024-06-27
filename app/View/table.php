<body>
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
</html>