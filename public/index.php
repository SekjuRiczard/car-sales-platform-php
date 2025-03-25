<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <header class="headerIndex">
        <div class="logoContainer">
            <img class="logo" src="assets/logo.png" alt="logo">
            <p>Auto Local</p>
        </div>
        <div>
            <a href="dashboard.php">Oferty samochodow</a>
            <a href="sell.php">Wystaw ogloszenie</a>
        </div>
    </header>
    <main>
        <div class="sellingFilters">
            <h1>Kategorie: </h1>
            <div>
                <form>
                    <div class="filtersFirstRow">
                        <label for="marka">Marka:</label>
                        <select name="marka" id="marka">
                            <option value="volvo">Volvo</option>
                            <option value="audi">Audi</option>
                            <option value="bmw">BMW</option>
                            <option value="mercedes">Mercedes</option>
                        </select>
                        <label for="model">Model:</label>

                        <select name="model" id="model">
                            <option value="s60">S60</option>
                            <option value="a4">A4</option>
                            <option value="e46">E46</option>
                            <option value="c200">C200</option>
                        </select>

                        <label for="cenaDo">Cena do:</label>
                        <select>
                            <option value="10000">10000</option>
                            <option value="20000">20000</option>
                            <option value="30000">30000</option>
                            <option value="40000">40000</option>
                            <option value="50000">50000</option>
                            <option value="60000">60000</option>
                            <option value="70000">70000</option>
                            <option value="80000">80000</option>
                            <option value="90000">90000</option>
                            <option value="100000">100000</option>
                            <option value="110000">110000</option>
                            <option value="120000">120000</option>
                            <option value="130000">130000</option>
                            <option value="140000">140000</option>
                            <option value="150000">150000</option>
                            <option value="160000">160000</option>
                            <option value="170000">170000</option>
                            <option value="180000">180000</option>
                            <option value="190000">190000</option>
                            <option value="200000">200000</option>
                        </select>
                    </div>
                    <div class="filtersSecondRow">
                        <label for="rok">Rok produkcji od:</label>
                        <select name="rok" id="rok">
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                        </select>

                        <label for="przebiegOd">Przebieg od:</label>
                        <select name="przebieg" id="przebieg">
                            <option value="0">0</option>
                            <option value="10000">10000</option>
                            <option value="20000">20000</option>
                            <option value="30000">30000</option>
                            <option value="40000">40000</option>
                            <option value="50000">50000</option>
                            <option value="60000">60000</option>
                            <option value="70000">70000</option>
                            <option value="80000">80000</option>
                            <option value="90000">90000</option>
                            <option value="100000">100000</option>
                            <option value="110000">110000</option>
                            <option value="120000">120000</option>
                            <option value="130000">130000</option>
                            <option value="140000">140000</option>
                            <option value="150000">150000</option>
                            <option value="160000">160000</option>
                            <option value="170000">170000</option>
                            <option value="180000">180000</option>
                            <option value="190000">190000</option>
                            <option value="200000">200000</option>
                        </select>

                        <label for="przebiegDo">Przebieg do:</label>
                        <select>
                            <option value="200000">200000</option>
                            <option value="200000">210000</option>
                            <option value="200000">220000</option>
                            <option value="200000">230000</option>
                            <option value="200000">240000</option>
                            <option value="200000">250000</option>
                            <option value="200000">260000</option>
                            <option value="200000">270000</option>
                            <option value="200000">280000</option>
                            <option value="200000">290000</option>
                            <option value="200000">300000</option>
                        </select>

                        <button type="submit">Szukaj</button>
                    </div>

                </form>
            </div>
            <div class="highLightedOffers">
                <h1>Wyróżnione oferty</h1>
            </div>
    </main>

    <footer>
        <p>Footer</p>
    </footer>

</body>

</html>