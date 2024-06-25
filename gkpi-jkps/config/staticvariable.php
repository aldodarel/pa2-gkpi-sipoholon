<?php

class StaticVariable
{   
    // public static $user;
    static $navbarPendeta = [
        [
            "isGroup" => true,
            "name" => "Beranda",
            "url" => "/pendeta",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga Aktif",
                    "url" => "/pendeta/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Keluarga Tidak Aktif",
                    "url" => "/pendeta/data/keluarga/tidakaktif",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat Aktif",
                    "url" => "/pendeta/data/jemaat",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Jemaat Tidak Aktif",
                    "url" => "/pendeta/data/jemaatTidakaktif",
                    "icon" => '<i class="fa fa-user-times" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Jemaat Berulang Tahun",
                    "url" => "/pendeta/data/jemaatulangtahun",
                    "icon" => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Sektor",
            "navbars" => [
                [
                    "name" => "Data Keanggotaan Sektor",
                    "url" => "/pendeta/data/sektor/anggota",
                    "icon" => '<i class="fa fa-address-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Sektor",
                    "url" => "/pendeta/data/sektor",
                    "icon" => '<i class="fa fa-address-card" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Keuangan",
            "navbars" => [
                [
                    "name" => "Tambah Data Keuangan",
                    "url" => "/pendeta/data/keuangan/add",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Ibadah",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/pendeta/data/persembahanibadah/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                // [
                //     "name" => "Pengeluaran",
                //     "url" => "/pengurusharian/data/persembahanibadah/pengeluaran",
                //     "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                // ]
            ]
        ],

        [
            "isGroup" => true,
            "name" => "Kas Gereja",
            "navbars" => [
                [
                    "name" => "Persentase Kas",
                    "url" => "/pendeta/data/persembahanibadah/pembagian",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ], 
                // [
                //     "name" => "Pemasukan Kas",
                //     "url" => "",
                //     "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                // ],
                [
                    "name" => "Pengeluaran Kas",
                    "url" => "/pendeta/data/keuangan/pengeluarankas",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Diakoni Sosial",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/pendeta/data/persembahandiakonia/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Pengeluaran",
                    "url" => "/pendeta/data/persembahandiakonia/pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Khusus",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/pendeta/data/persembahankhusus/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Pengeluaran",
                    "url" => "/pendeta/data/persembahankhusus/pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Pelayan Gereja",
            "navbars" => [
                [
                    "name" => "Data Pelayan",
                    "url" => "/pendeta/pelayangereja",
                    "icon" => '<i class="fa fa-id-badge" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Jadwal Pelayan",
                    "url" => "/pendeta/pelayanan",
                    "icon" => '<i class="fa fa-calendar" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Renungan Ibadah",
            "navbars" => [
                [
                    "name" => "Data Renungan",
                    "url" => "/pendeta/renungan",
                    "icon" => '<i class="fa fa-file-text" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jadwal Ibadah",
            "navbars" => [
                [
                    "name" => "Data Jadwal Ibadah",
                    "url" => "/pendeta/jadwal",
                    "icon" => '<i class="fa fa-calendar" aria-hidden="true"></i>',
                ]
            ]
        ],
        // [
        //     "isGroup" => true,
        //     "name" => "Program Kerja Pelayanan",
        //     "navbars" => [
        //         [
        //             "name" => "Data Rancangan Program Kerja",
        //             "url" => "/pendeta/programkerja",
        //             "icon" => '<i class="fa fa-file-text" aria-hidden="true"></i>',
        //         ],
        //         [
        //             "name" => "Data Rancangan Anggaran Penerimaan dan Belanja ",
        //             "url" => "/pendeta/RAPB",
        //             "icon" => '<i class="fa fa-file-text" aria-hidden="true"></i>',
        //         ],
        //         [
        //             "name" => "Tambah Program",
        //             "url" => "/pendeta/tambah-program",
        //             "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
        //         ]
        //     ]
        // ],

        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Data Berita Gereja",
                    "url" => "/pendeta/berita",
                    "icon" => '<i class="fa fa-newspaper-o" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
    static $user = null;
    static $navbarPengurusHarian = [
        [
            "isGroup" => true,
            "name" => "Beranda",
            "url" => "/pengurusharian",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga Aktif",
                    "url" => "/pengurusharian/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Keluarga Tidak Aktif",
                    "url" => "/pengurusharian/data/keluarga/tidakaktif",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat Aktif",
                    "url" => "/pengurusharian/data/jemaat",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Jemaat Tidak Aktif",
                    "url" => "/pengurusharian/data/jemaatTidakaktif",
                    "icon" => '<i class="fa fa-user-times" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Jemaat Berulang Tahun",
                    "url" => "/pengurusharian/data/jemaatulangtahun",
                    "icon" => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Sektor",
            "navbars" => [
                [
                    "name" => "Data Keanggotaan Sektor",
                    "url" => "/pengurusharian/data/sektor/anggota",
                    "icon" => '<i class="fa fa-address-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Sektor",
                    "url" => "/pengurusharian/data/sektor",
                    "icon" => '<i class="fa fa-address-card" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Keuangan",
            "navbars" => [
                [
                    "name" => "Tambah Data Keuangan",
                    "url" => "/pengurusharian/data/keuangan/add",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Ibadah",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/pengurusharian/data/persembahanibadah/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                // [
                //     "name" => "Pengeluaran",
                //     "url" => "/pengurusharian/data/persembahanibadah/pengeluaran",
                //     "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                // ]
            ]
        ],

        [
            "isGroup" => true,
            "name" => "Kas Gereja",
            "navbars" => [
                [
                    "name" => "Persentase Kas",
                    "url" => "/pengurusharian/data/persembahanibadah/pembagian",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ], 
                // [
                //     "name" => "Pemasukan Kas",
                //     "url" => "",
                //     "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                // ],
                [
                    "name" => "Pengeluaran Kas",
                    "url" => "/pengurusharian/data/keuangan/pengeluarankas",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Diakoni Sosial",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/pengurusharian/data/persembahandiakonia/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Pengeluaran",
                    "url" => "/pengurusharian/data/persembahandiakonia/pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Khusus",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/pengurusharian/data/persembahankhusus/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Pengeluaran",
                    "url" => "/pengurusharian/data/persembahankhusus/pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Pelayan Gereja",
            "navbars" => [
                [
                    "name" => "Data Pelayan",
                    "url" => "/pengurusharian/pelayangereja",
                    "icon" => '<i class="fa fa-id-badge" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Jadwal Pelayan",
                    "url" => "/pengurusharian/pelayanan",
                    "icon" => '<i class="fa fa-calendar" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Renungan Ibadah",
            "navbars" => [
                [
                    "name" => "Data Renungan",
                    "url" => "/pengurusharian/renungan",
                    "icon" => '<i class="fa fa-file-text" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jadwal Ibadah",
            "navbars" => [
                [
                    "name" => "Data Jadwal Ibadah",
                    "url" => "/pengurusharian/jadwal",
                    "icon" => '<i class="fa fa-calendar" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Program Kerja Pelayanan",
            "navbars" => [
                [
                    "name" => "Data Rancangan Program Kerja",
                    "url" => "/pengurusharian/programkerja",
                    "icon" => '<i class="fa fa-file-text" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Rancangan Anggaran Penerimaan dan Belanja ",
                    "url" => "/pengurusharian/RAPB",
                    "icon" => '<i class="fa fa-file-text" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Program",
                    "url" => "/pengurusharian/tambah-program",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],

        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Data Berita Gereja",
                    "url" => "/pengurusharian/berita",
                    "icon" => '<i class="fa fa-newspaper-o" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];



    static $navbarPenatua = [
        [
            "name" => "Beranda",
            "url" => "/penatua",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga Aktif",
                    "url" => "/penatua/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Keluarga Tidak Aktif",
                    "url" => "/penatua/data/keluarga/tidakaktif",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat Aktif",
                    "url" => "/penatua/data/jemaat",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Jemaat Tidak Aktif",
                    "url" => "/penatua/data/jemaatTidakaktif",
                    "icon" => '<i class="fa fa-user-times" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Jemaat Berulang Tahun",
                    "url" => "/penatua/data/jemaatulangtahun",
                    "icon" => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Ibadah",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/penatua/data/persembahanibadah/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],

        [
            "isGroup" => true,
            "name" => "Kas Gereja",
            "navbars" => [
                [
                    "name" => "Pengeluaran Kas",
                    "url" => "/penatua/data/keuangan/pengeluarankas",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Diakoni Sosial",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/penatua/data/persembahandiakonia/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Pengeluaran",
                    "url" => "/penatua/data/persembahandiakonia/pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Khusus",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/penatua/data/persembahankhusus/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Pengeluaran",
                    "url" => "/penatua/data/persembahankhusus/pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jadwal Ibadah",
            "navbars" => [
                [
                    "name" => "Data Jadwal Ibadah",
                    "url" => "/penatua/jadwal",
                    "icon" => '<i class="fa fa-calendar" aria-hidden="true"></i>',
                ],
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Data Berita Gereja",
                    "url" => "/penatua/berita",
                    "icon" => '<i class="fa fa-newspaper-o" aria-hidden="true"></i>',
                ],
            ]
        ]
    ];

    static $navbarJemaat = [
        [
            "name" => "Beranda",
            "url" => "/jemaat",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat Berulang Tahun",
                    "url" => "/jemaat/data/jemaatulangtahun",
                    "icon" => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jadwal Ibadah",
            "navbars" => [
                [
                    "name" => "Data Jadwal Ibadah",
                    "url" => "/jemaat/jadwal",
                    "icon" => '<i class="fa fa-calendar" aria-hidden="true"></i>',
                ],
            ]
        ],    
        [
            "isGroup" => true,
            "name" => "Persembahan Ibadah",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/jemaat/data/persembahanibadah/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Kas Gereja",
            "navbars" => [
                [
                    "name" => "Pengeluaran Kas",
                    "url" => "/jemaat/data/keuangan/pengeluarankas",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Diakoni Sosial",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/jemaat/data/persembahandiakonia/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Pengeluaran",
                    "url" => "/jemaat/data/persembahandiakonia/pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Persembahan Khusus",
            "navbars" => [
                [
                    "name" => "Pemasukan",
                    "url" => "/jemaat/data/persembahankhusus/pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Pengeluaran",
                    "url" => "/jemaat/data/persembahankhusus/pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
}
