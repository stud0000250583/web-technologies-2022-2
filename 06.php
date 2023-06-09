<?php
$regions = array(
    "Московская область" => [
        "Москва",
        "Балашиха",
        "Домодедово",
        "Дмитров"
    ],
    "Ленинградская область" => [
        "Санкт-Петербург",
        "Мурино",
        "Гатчина",
        "Сосновый Бор"
    ],
    "Рязанская область" => [
        "Рязань",
        "Касимов",
        "Скопин",
        "Сасово"
    ]
);

foreach ($regions as $region => $cities) {
    $cities_array = [];
    foreach ($cities as $city)
        if (str_starts_with($city, "К"))
            array_push($cities_array, $city);

    if (count($cities_array) != 0)
        echo $region . ":<br>" . implode(", ", $cities_array) . ".<br><br>";
}
?>