<?php

// // Connexion variables
// define('DB_HOST', 'localhost');
// define('DB_PORT', '8889');
// define('DB_NAME', 'hetic_p2022_students');
// define('DB_USER', 'root');
// define('DB_PASS', 'root');

// try
// {
//     $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT, DB_USER, DB_PASS);
//     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// }
// catch(PDOException $e)
// {
//     die('Couldn\'t connect');
// }

// $students = [
//     ['AFRIAT', 'Jérémy', 'afriat_jeremy'],
//     ['ANIMBO', 'Coline', 'animbo_coline'],
//     ['ARMAND', 'Antoine', 'armand_antoine'],
//     ['ARNOULT', 'Aymeric', 'arnoult_aymeric'],
//     ['AVEZ', 'Gaëtan', 'avez_gaetan'],
//     ['BANOVSKY', 'Cyrille', 'banovsky_cyrille'],
//     ['BAREL', 'Baptiste', 'barel_baptiste'],
//     ['BELOLO', 'Samuel', 'belolo_samuel'],
//     ['BEN HENDA', 'Youssef', 'ben_henda_youssef'],
//     ['BENICHOU', 'Armand', 'benichou_armand'],
//     ['BERGERARD', 'Maxime', 'bergerard_maxime'],
//     ['BONNAVES', 'Louise', 'bonnaves_louise'],
//     ['BOULANOUAR', 'Corentin', 'boulanouar_corentin'],
//     ['BOUY', 'Alphonse', 'bouy_alphonse'],
//     ['BRUNEL', 'Vincent', 'brunel_vincent'],
//     ['BRUNET', 'Florian', 'brunet_florian'],
//     ['BUÉE', 'Manon', 'buee_manon'],
//     ['BURIAS', 'Gautier', 'burias_gautier'],
//     ['CASSAGNE--LORY', 'Maxime', 'cassagne_lory_maxime'],
//     ['CHABEAU', 'Alexandre', 'chabeau_alexandre'],
//     ['CHAPELAIN', 'Hugo', 'chapelain_hugo'],
//     ['CHEN', 'Julie', 'chen_julie'],
//     ['COMPAN', 'Carla', 'compan_carla'],
//     ['CROSET', 'Clarisse', 'croset_clarisse'],
//     ['D\'ASSIGNIES', 'Marin', 'd_assignies_marin'],
//     ['DAUPLEY', 'Gabin', 'daupley_gabin'],
//     ['DELACHAUME', 'Alban', 'delachaume_alban'],
//     ['DEVANNE', 'Constance', 'devanne_constance'],
//     ['DOS SANTOS', 'Philippe', 'dos_santos_philippe'],
//     ['EL FARGOUGUI', 'Abid', 'el_fargougui_abid'],
//     ['FAYOLLE', 'Mario', 'fayolle_mario'],
//     ['FAZAKERLEY', 'Nemo', 'fazakerley_nemo'],
//     ['FENIQUE', 'Théo', 'fenique_theo'],
//     ['FERNANDEZ', 'Diego', 'fernandez_diego'],
//     ['FERTÉ', 'Ulysse', 'ferte_ulysse'],
//     ['GADIE', 'Mathis', 'gadie_mathis'],
//     ['GANDER', 'Matthias', 'gander_matthias'],
//     ['GAYREL', 'Thibaut', 'gayrel_thibaut'],
//     ['GEBEROWICZ', 'Ulysse', 'geberowicz_ulysse'],
//     ['GENTRIC', 'Loana', 'gentric_loana'],
//     ['GLOAGUEN', 'Lou', 'gloaguen_lou'],
//     ['GREUX', 'Alexis', 'greux_alexis'],
//     ['GROSS', 'Yoan', 'gross_yoan'],
//     ['GUERIN', 'Felix', 'guerin_felix'],
//     ['GUESNON', 'Jules', 'guesnon_jules'],
//     ['GUILPAIN', 'Maxence', 'guilpain_maxence'],
//     ['GUYARD DE CHALAMBERT', 'Victor', 'guyard_de_chalambert_victor'],
//     ['GUYOT', 'Claire', 'guyot_claire'],
//     ['HADDOU', 'Paul', 'haddou_paul'],
//     ['HALICKI', 'Oscar', 'halicki_oscar'],
//     ['HALICKI', 'Victor', 'halicki_victor'],
//     ['HILLAIRET', 'Alex', 'hillairet_alex'],
//     ['ISAUTIER', 'Eloïse', 'isautier_eloise'],
//     ['IZBORNICKI', 'Samuel', 'izbornicki_samuel'],
//     ['JEZEQUEL', 'Quentin', 'jezequel_quentin'],
//     ['JOËSSEL', 'Pierre', 'joessel_pierre'],
//     ['JULLIEN', 'Théo', 'jullien_theo'],
//     ['KELLER', 'Romain', 'keller_romain'],
//     ['KHANOYAN', 'Romain', 'khanoyan_romain'],
//     ['LACROIX', 'Thomas', 'lacroix_thomas'],
//     ['LAPISARDI', 'Morgane', 'lapisardi_morgane'],
//     ['LEHOT', 'Lucas', 'lehot_lucas'],
//     ['LELLOUCHE', 'Ilan', 'lellouche_ilan'],
//     ['LEVET', 'Jules', 'levet_jules'],
//     ['LONGUEBRAY', 'Claire', 'longuebray_claire'],
//     ['MAILLARD', 'Quentin', 'maillard_quentin'],
//     ['MAILLOT', 'Romain', 'maillot_romain'],
//     ['MANCEAU', 'François-Xavier', 'manceau_francois_xavier'],
//     ['MAUPAS', 'Gabriel', 'maupas_gabriel'],
//     ['MERCIÉ', 'Paul', 'mercie_paul'],
//     ['MEZIN', 'Audrey', 'mezin_audrey'],
//     ['MOEHN', 'Aymeric', 'moehn_aymeric'],
//     ['MONNIER', 'Charles', 'monnier_charles'],
//     ['MOUQUET', 'Amaury', 'mouquet_amaury'],
//     ['PALANDOKEN', 'Emre', 'palandoken_emre'],
//     ['PAROT', 'Clément', 'parot_clement'],
//     ['PASDELOUP', 'Lissandre', 'pasdeloup_lissandre'],
//     ['PECOUT', 'Manolo', 'pecout_manolo'],
//     ['PELAT', 'Kérian', 'pelat_kerian'],
//     ['PERALTA', 'Raphaël', 'peralta_raphael'],
//     ['PERICAT', 'Boris', 'pericat_boris'],
//     ['PETIT', 'Louis-Charles', 'petit_louis_charles'],
//     ['POINTIER', 'Grégoire', 'pointier_gregoire'],
//     ['POIRIER', 'Thomas', 'poirier_thomas'],
//     ['PONCET', 'Noémie', 'poncet_noemie'],
//     ['POULAIN', 'Jessica', 'poulain_jessica'],
//     ['PREJEAN', 'Martin', 'prejean_martin'],
//     ['RICHARD', 'Thibault', 'richard_thibault'],
//     ['ROBERT', 'Raphaël', 'robert_raphael'],
//     ['ROBILLARD', 'Camille', 'robillard_camille'],
//     ['ROMEO', 'Emma', 'romeo_emma'],
//     ['RUAULT', 'Baptiste', 'ruault_baptiste'],
//     ['SABLONG', 'Léo', 'sablong_leo'],
//     ['SEKAR', 'Sathya', 'sekar_sathya'],
//     ['SMAGGHE', 'Damien', 'smagghe_damien'],
//     ['STALIN', 'Jules', 'stalin_jules'],
//     ['STARK', 'Camille', 'stark_camille'],
//     ['STUYCK', 'Louis', 'stuyck_louis'],
//     ['THIRY', 'Sylvain', 'thiry_sylvain'],
//     ['THOMAS', 'Axel', 'thomas_axel'],
//     ['TIREL', 'Robin', 'tirel_robin'],
//     ['TOIRON', 'Bastien', 'toiron_bastien'],
//     ['TOURTOULOU', 'Sacha', 'tourtoulou_sacha'],
//     ['VESIER', 'Clément', 'vesier_clement'],
//     ['WANTZ', 'Thomas', 'wantz_thomas'],
//     ['ZACCARDI', 'Lucie', 'zaccardi_lucie'],
//     ['ZAMBERNARDI', 'Sébastien', 'zambernardi_sebastien'],
// ];

// foreach($students as $_student)
// {
//     $data = [
//         'id_year' => 6,
//         'first_name' => $_student[0],
//         'last_name' => $_student[1],
//         'slug' => $_student[2],
//         'skill_development' => rand(2, 5),
//         'skill_design' => rand(2, 5),
//         'skill_marketing' => rand(2, 5),
//     ];

//     $prepare = $pdo->prepare('INSERT INTO students (id_year, first_name, last_name, slug, skill_development, skill_design, skill_marketing) VALUES (:id_year, :first_name, :last_name, :slug, :skill_development, :skill_design, :skill_marketing)');
//     $prepare->execute($data);
// }