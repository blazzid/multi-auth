<?php

return [
    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai banyak versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */

    'accepted'             => 'Bidang ini harus diterima.',
    'active_url'           => 'Bidang ini bukan URL yang valid.',
    'after'                => 'Bidang ini harus berisi tanggal setelah :date.',
    'after_or_equal'       => 'Bidang ini harus berisi tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Bidang ini hanya boleh berisi huruf.',
    'alpha_dash'           => 'Bidang ini hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num'            => 'Bidang ini hanya boleh berisi huruf dan angka.',
    'array'                => 'Bidang ini harus berisi sebuah array.',
    'before'               => 'Bidang ini harus berisi tanggal sebelum :date.',
    'before_or_equal'      => 'Bidang ini harus berisi tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Bidang ini harus bernilai antara :min sampai :max.',
        'file'    => 'Bidang ini harus berukuran antara :min sampai :max kilobita.',
        'string'  => 'Bidang ini harus berisi antara :min sampai :max karakter.',
        'array'   => 'Bidang ini harus memiliki :min sampai :max anggota.',
    ],
    'boolean'              => 'Bidang ini harus bernilai true atau false',
    'confirmed'            => 'Konfirmasi Bidang ini tidak cocok.',
    'date'                 => 'Bidang ini bukan tanggal yang valid.',
    'date_equals'          => 'Bidang ini harus berisi tanggal yang sama dengan :date.',
    'date_format'          => 'Bidang ini tidak cocok dengan format :format.',
    'different'            => 'Bidang ini dan :other harus berbeda.',
    'digits'               => 'Bidang ini harus terdiri dari :digits angka.',
    'digits_between'       => 'Bidang ini harus terdiri dari :min sampai :max angka.',
    'dimensions'           => 'Bidang ini tidak memiliki dimensi gambar yang valid.',
    'distinct'             => 'Bidang ini memiliki nilai yang duplikat.',
    'email'                => 'Bidang ini harus berupa alamat surel yang valid.',
    'ends_with'            => 'Bidang ini harus diakhiri salah satu dari berikut: :values',
    'exists'               => 'Bidang ini yang dipilih tidak valid.',
    'file'                 => 'Bidang ini harus berupa sebuah berkas.',
    'filled'               => 'Bidang ini harus memiliki nilai.',
    'gt'                   => [
        'numeric' => 'Bidang ini harus bernilai lebih besar dari :value.',
        'file'    => 'Bidang ini harus berukuran lebih besar dari :value kilobita.',
        'string'  => 'Bidang ini harus berisi lebih besar dari :value karakter.',
        'array'   => 'Bidang ini harus memiliki lebih dari :value anggota.',
    ],
    'gte'                  => [
        'numeric' => 'Bidang ini harus bernilai lebih besar dari atau sama dengan :value.',
        'file'    => 'Bidang ini harus berukuran lebih besar dari atau sama dengan :value kilobita.',
        'string'  => 'Bidang ini harus berisi lebih besar dari atau sama dengan :value karakter.',
        'array'   => 'Bidang ini harus terdiri dari :value anggota atau lebih.',
    ],
    'image'                => 'Bidang ini harus berupa gambar.',
    'in'                   => 'Bidang ini yang dipilih tidak valid.',
    'in_array'             => 'Bidang ini tidak ada di dalam :other.',
    'integer'              => 'Bidang ini harus berupa bilangan bulat.',
    'ip'                   => 'Bidang ini harus berupa alamat IP yang valid.',
    'ipv4'                 => 'Bidang ini harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => 'Bidang ini harus berupa alamat IPv6 yang valid.',
    'json'                 => 'Bidang ini harus berupa JSON string yang valid.',
    'lt'                   => [
        'numeric' => 'Bidang ini harus bernilai kurang dari :value.',
        'file'    => 'Bidang ini harus berukuran kurang dari :value kilobita.',
        'string'  => 'Bidang ini harus berisi kurang dari :value karakter.',
        'array'   => 'Bidang ini harus memiliki kurang dari :value anggota.',
    ],
    'lte'                  => [
        'numeric' => 'Bidang ini harus bernilai kurang dari atau sama dengan :value.',
        'file'    => 'Bidang ini harus berukuran kurang dari atau sama dengan :value kilobita.',
        'string'  => 'Bidang ini harus berisi kurang dari atau sama dengan :value karakter.',
        'array'   => 'Bidang ini harus tidak lebih dari :value anggota.',
    ],
    'max'                  => [
        'numeric' => 'Bidang ini maksimal bernilai :max.',
        'file'    => 'Bidang ini maksimal berukuran :max kilobita.',
        'string'  => 'Bidang ini maksimal berisi :max karakter.',
        'array'   => 'Bidang ini maksimal terdiri dari :max anggota.',
    ],
    'mimes'                => 'Bidang ini harus berupa berkas berjenis: :values.',
    'mimetypes'            => 'Bidang ini harus berupa berkas berjenis: :values.',
    'min'                  => [
        'numeric' => 'Bidang ini minimal bernilai :min.',
        'file'    => 'Bidang ini minimal berukuran :min kilobita.',
        'string'  => 'Bidang ini minimal berisi :min karakter.',
        'array'   => 'Bidang ini minimal terdiri dari :min anggota.',
    ],
    'multiple_of'          => 'The Bidang ini must be a multiple of :value',
    'not_in'               => 'Bidang ini yang dipilih tidak valid.',
    'not_regex'            => 'Format Bidang ini tidak valid.',
    'numeric'              => 'Bidang ini harus berupa angka.',
    'password'             => 'Kata sandi salah.',
    'present'              => 'Bidang ini wajib ada.',
    'regex'                => 'Format Bidang ini tidak valid.',
    'required'             => 'Bidang ini wajib diisi.',
    'required_if'          => 'Bidang ini wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Bidang ini wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Bidang ini wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Bidang ini wajib diisi bila terdapat :values.',
    'required_without'     => 'Bidang ini wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Bidang ini wajib diisi bila sama sekali tidak terdapat :values.',
    'same'                 => 'Bidang ini dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Bidang ini harus berukuran :size.',
        'file'    => 'Bidang ini harus berukuran :size kilobyte.',
        'string'  => 'Bidang ini harus berukuran :size karakter.',
        'array'   => 'Bidang ini harus mengandung :size anggota.',
    ],
    'starts_with'          => 'Bidang ini harus diawali salah satu dari berikut: :values',
    'string'               => 'Bidang ini harus berupa string.',
    'timezone'             => 'Bidang ini harus berisi zona waktu yang valid.',
    'unique'               => 'Bidang ini sudah ada sebelumnya.',
    'uploaded'             => 'Bidang ini gagal diunggah.',
    'url'                  => 'Format Bidang ini tidak valid.',
    'uuid'                 => 'Bidang ini harus merupakan UUID yang valid.',

    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |---------------------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi untuk atribut sesuai keinginan dengan
    | menggunakan konvensi "attribute.rule" dalam penamaan barisnya. Hal ini mempercepat
    | dalam menentukan baris bahasa kustom yang spesifik untuk aturan atribut yang diberikan.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |---------------------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar 'placeholder' atribut dengan sesuatu
    | yang lebih mudah dimengerti oleh pembaca seperti "Alamat Surel" daripada "surel" saja.
    | Hal ini membantu kita dalam membuat pesan menjadi lebih ekspresif.
    |
    */

    'attributes' => [
        'new_password' => 'Sandi Baru',
    ],
];