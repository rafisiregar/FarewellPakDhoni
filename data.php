<?php
$questions = [
    [
        "answer" => "Ir. Soekarno",
        "img" => "images/soekarno.jpeg",
        "choices" => [
            ["name" => "Ir. Soekarno", "img" => "images/soekarno.jpeg"],
            ["name" => "Moh. Hatta", "img" => "images/soekarno.jpeg"],
            ["name" => "Soeharto", "img" => "images/soekarno.jpeg"]
        ]
    ],
    [
        "answer" => "Moh. Hatta",
        "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Mohammad_Hatta.jpg/440px-Mohammad_Hatta.jpg",
        "choices" => [
            ["name" => "Ir. Soekarno", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/COLLECTIE_TROPENMUSEUM_Portretfoto_van_Soekarno_TMnr_10018503.jpg/440px-COLLECTIE_TROPENMUSEUM_Portretfoto_van_Soekarno_TMnr_10018503.jpg"],
            ["name" => "Moh. Hatta", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Mohammad_Hatta.jpg/440px-Mohammad_Hatta.jpg"],
            ["name" => "B.J. Habibie", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Habibie_Bacharuddin_Jusuf.jpg/440px-Habibie_Bacharuddin_Jusuf.jpg"]
        ]
    ],
    [
        "answer" => "Soeharto",
        "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Soeharto%2C_1993.jpg/440px-Soeharto%2C_1993.jpg",
        "choices" => [
            ["name" => "Soeharto", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Soeharto%2C_1993.jpg/440px-Soeharto%2C_1993.jpg"],
            ["name" => "B.J. Habibie", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Habibie_Bacharuddin_Jusuf.jpg/440px-Habibie_Bacharuddin_Jusuf.jpg"],
            ["name" => "Moh. Hatta", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Mohammad_Hatta.jpg/440px-Mohammad_Hatta.jpg"]
        ]
    ],
    [
        "answer" => "B.J. Habibie",
        "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Habibie_Bacharuddin_Jusuf.jpg/440px-Habibie_Bacharuddin_Jusuf.jpg",
        "choices" => [
            ["name" => "Ir. Soekarno", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/COLLECTIE_TROPENMUSEUM_Portretfoto_van_Soekarno_TMnr_10018503.jpg/440px-COLLECTIE_TROPENMUSEUM_Portretfoto_van_Soekarno_TMnr_10018503.jpg"],
            ["name" => "B.J. Habibie", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Habibie_Bacharuddin_Jusuf.jpg/440px-Habibie_Bacharuddin_Jusuf.jpg"],
            ["name" => "Soeharto", "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Soeharto%2C_1993.jpg/440px-Soeharto%2C_1993.jpg"]
        ]
    ]
];

header('Content-Type: application/json');
echo json_encode($questions);