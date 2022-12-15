<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';

if (isset($_POST['gamesFinder'])) {
    $name = str_replace(' ', '+', $_POST['search']);

    $url = 'https://boardgamegeek.com/xmlapi2/search?type=boardgame&query=' . $name;
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);

    $data = curl_exec($curl);
    $xml = simplexml_load_string($data);
    $searchArray = json_decode(json_encode((array) $xml), TRUE);
    $idGamesArray = array();

    foreach ($searchArray['item'] as $game) {
        array_push($idGamesArray, (string) $game['@attributes']['id']);
    }
    curl_close($curl);


    $url = 'https://boardgamegeek.com/xmlapi2/thing?id=' . implode(',', $idGamesArray);
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);

    $data = curl_exec($curl);
    $xml = simplexml_load_string($data);
    $searchArray = json_decode(json_encode((array) $xml), TRUE);
    $searchGames = array();

    foreach ($searchArray['item'] as $game) {
        $searchGames[] = [
            'image' => $game['thumbnail'],
            'id' => $game['@attributes']['id'],
            'name' => ($game['name']['@attributes']['value'] != '') ? $game['name']['@attributes']['value'] : $game['name'][0]['@attributes']['value'],
        ];
    }

    curl_close($curl);


} else if ($_POST['gameID']) {

    $url = 'https://boardgamegeek.com/xmlapi2/thing?id=' . $_POST['gameID'] . '&stats=1';
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);

    $data = curl_exec($curl);
    $xml = simplexml_load_string($data);
    $searchArray = json_decode(json_encode((array) $xml), TRUE);
    $game = $searchArray['item'];
    $gameCategories = $gameMechanics = $gamePublisher = array();
    foreach ($game['link'] as $link) {
        if ($link['@attributes']['type'] == 'boardgamecategory') {
            array_push($gameCategories, $link['@attributes']['value']);
        } else if ($link['@attributes']['type'] == 'boardgamemechanic') {
            array_push($gameMechanics, $link['@attributes']['value']);
        } else if ($link['@attributes']['type'] == 'boardgamepublisher') {
            array_push($gamePublisher, $link['@attributes']['value']);
        }
    }
    $gameInfo = [
        'url' => 'https://boardgamegeek.com/boardgame/' . $_POST['gameID'],
        'image' => $game['image'],
        'name' => ($game['name']['@attributes']['value'] != '') ? $game['name']['@attributes']['value'] : $game['name'][0]['@attributes']['value'],
        'description' => $game['description'],
        'year' => $game['yearpublished']['@attributes']['value'],
        'minplayers' => $game['minplayers']['@attributes']['value'],
        'maxplayers' => $game['maxplayers']['@attributes']['value'],
        'minplaytime' => $game['minplaytime']['@attributes']['value'],
        'maxplaytime' => $game['maxplaytime']['@attributes']['value'],
        'age' => $game['minage']['@attributes']['value'],
        'categories' => $gameCategories,
        'mechanics' => $gameMechanics,
        'rating' => round($game['statistics']['ratings']['average']['@attributes']['value'], 1),
        'rank' => ($game['statistics']['ratings']['ranks']['rank']['@attributes']['value'] != '') ? $game['statistics']['ratings']['ranks']['rank']['@attributes']['value'] : $game['statistics']['ratings']['ranks']['rank']['0']['@attributes']['value'],
        'family' => str_replace(' Rank', '', $game['statistics']['ratings']['ranks']['rank']['1']['@attributes']['friendlyname']),
        'weight' => round($game['statistics']['ratings']['averageweight']['@attributes']['value'], 1) . ' / 5',
        'publisher' => $gamePublisher[0],
    ];
    curl_close($curl);

} else {

    $url = 'https://boardgamegeek.com/xmlapi2/hot?type=boardgame';
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);

    $data = curl_exec($curl);
    $xml = simplexml_load_string($data);
    $hotGames = array();
    foreach ($xml->item as $game) {
        $hotGames[(string) $game['rank']] = [
            'id' => (string) $game['id'],
            'image' => (string) $game->thumbnail['value'],
            'name' => (string) $game->name['value'],
        ];
    }
    curl_close($curl);
}


include_once BASE_PATH . VIEWS_PATH . '/games.php';
?>