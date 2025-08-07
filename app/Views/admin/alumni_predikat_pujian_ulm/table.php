<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 min-h-screen flex min-w-[960px]">

  <nav class="sidebar bg-blue-800 text-white w-60 flex flex-col justify-between px-5 pb-8 pt-2"
    aria-label="Main navigation">
    <div>
      <div class="title font-bold text-2xl pb-2 border-b border-white/30 select-none">ADMIN</div>
      <ul class="nav-links list-none p-0 mt-10" role="menu" aria-label="Primary navigation links">
        <li class="mb-5">
          <a href="#" role="menuitem" tabindex="0"
            class="flex items-center text-base font-medium gap-3 hover:text-blue-200">
            <svg class="icon w-5 h-5 fill-white" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
              <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
            </svg>
            Dashboard
          </a>
        </li>
        <li class="mb-5">
          <a href="#" role="menuitem" tabindex="0"
            class="flex items-center text-base font-medium gap-3 hover:text-blue-200">
            <svg class="icon w-5 h-5 fill-white" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
              <path
                d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-10l-6-6zm-1 10H8v-2h5v2zm3-5V3.5L18.5 8H16z" />
            </svg>
            Table Data
          </a>
        </li>
        <li class="mb-5">
          <a href="#" role="menuitem" tabindex="0"
            class="flex items-center text-base font-medium gap-3 hover:text-blue-200">
            <svg class="icon w-5 h-5 fill-white" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
              <path
                d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-3.33 0-6 1.67-6 4v2h12v-2c0-2.33-2.67-4-6-4z" />
            </svg>
            Data Mahasiswa
          </a>
        </li>
      </ul>
    </div>
    <div class="logout flex items-center gap-3 pt-4 border-t border-white/30 cursor-pointer" role="button" tabindex="0"
      aria-label="Logout">
      <svg class="icon w-6 h-6 fill-white flex-shrink-0" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
        <path d="M16 13v-2H7v-3l-5 4 5 4v-3zM20 3h-8v2h8v14h-8v2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
      </svg>
      <a href="<?= site_url('logout') ?>" class="text-base font-medium">Logout</a>
    </div>
  </nav>

  <main class="container flex-grow flex flex-col px-8 py-6 max-w-[80%]" role="main" aria-label="Admin main content">
    <header
      class="top-header-info bg-blue-800 rounded-lg h-16 flex items-center text-white px-6 justify-between mb-5 font-bold text-sm select-none">
      <div class="left-section flex items-center gap-3 flex-grow overflow-hidden" title="University and degree">
        <svg class="icon w-5 h-5 fill-white" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
          <path
            d="M10.5 2A2.5 2.5 0 0 0 8 4.5v15A2.5 2.5 0 0 0 10.5 22h3a2.5 2.5 0 0 0 2.5-2.5v-15A2.5 2.5 0 0 0 13.5 2h-3zM9 17h6v1H9v-1zm0-3h6v1H9v-1zm6-5H9v1h6V9z" />
        </svg>
        <div class="text font-semibold truncate" aria-label="University name">Pascasarjana Universitas Lambung Mangkurat
        </div>
      </div>
      <div class="right-section flex items-center gap-3 font-bold text-base min-w-[230px] justify-end">
        <div>
          ADMIN PASCASARJANA
          <div class="subtext font-normal text-xs mt-1 text-blue-100 select-none">adminexample@gmail.com</div>
        </div>
        <div class="user-icon w-11 h-11 rounded-full bg-white flex items-center justify-center flex-shrink-0">
          <svg class="icon w-7 h-7 fill-blue-800" viewBox="0 0 24 24">
            <path
              d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zM12 13.8c-3.9 0-7.2 2-7.2 4.8v1.2h14.4v-1.2c0-2.8-3.3-4.8-7.2-4.8z" />
          </svg>
        </div>
      </div>
    </header>

    <section class="table-container bg-white rounded-lg p-6 shadow flex-grow flex flex-col overflow-hidden"
      aria-label="Mahasiswa data table section">
      <div class="table-header flex justify-between items-start mb-1 flex-wrap gap-4">
        <div class="title-block min-w-[280px]">
          <div class="title-text font-bold text-lg select-none mb-1">Table Data </div>
          <div class="subtitle-text font-normal text-sm text-gray-500 select-none">Data Permohonan Penurunan SPP Alumni
            Predikat Pujian ULM</div>
        </div>
        <div class="actions flex gap-2 flex-wrap items-center">
          <button
            class="icon-button flex items-center gap-1 font-semibold text-sm border px-3 py-2 rounded-md text-blue-800 border-blue-800 bg-transparent hover:bg-blue-800 hover:text-white transition"
            aria-label="Export">
            <svg class="icon w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
            Export
          </button>
          <button
            class="primary-btn bg-blue-800 text-white border-blue-800 font-bold px-5 py-2 rounded-md hover:bg-blue-900 transition"
            aria-label="Add new Call to Action">+ Add new CTA</button>
        </div>
      </div>

      <div class="table-wrapper overflow-x-auto rounded-lg">
        <div class="h-[480px] overflow-y-auto rounded-lg">
          <table class="data-table w-full border-separate border-spacing-0 text-sm text-gray-700 min-w-[960px]"
            role="grid" aria-describedby="table-desc">
            <caption id="table-desc" class="sr-only hidden">Data Permohonan Penurunan SPP Alumni Predikat Pujian ULM
            </caption>
            <thead>
              <tr class="sticky top-0 z-10 bg-white">
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  No</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  Nama</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  No.
                  Pendaftaran</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  Program
                  Studi Pilihan</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  Fakultas
                  Terakhir</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  Prodi
                  Terakhir</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  Tahun
                  Lulus
                </th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  NIM
                  Terakhir</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  IPK</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  Predikat
                </th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  No. HP
                </th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  SK. Dasar
                </th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  Periode
                  Semester</th>
                <th scope="col"
                  class="text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer border-b border-gray-300">
                  Tahun
                  Ajaran</th>
                <th scope="col"
                  class="berkas text-left px-4 py-3 font-bold text-sm text-gray-800 whitespace-nowrap cursor-pointer bg-blue-50 sticky right-0 border-b border-gray-300">
                  Berkas</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;
              if (!empty($data)):
                foreach ($data as $row):
                  ?>
                  <tr class="border-b border-gray-200 hover:bg-blue-50 transition">
                    <td class="font-semibold text-gray-900 px-4 py-3"><?= ++$count; ?></td>
                    <td class="font-semibold text-gray-900 px-4 py-3"><?= $row->nama; ?></td>
                    <td class="px-4 py-3"><?= $row->no_tpa_nim ?></td>
                    <td class="px-4 py-3"><?= $row->nama_prodi ?></td>
                    <td class="px-4 py-3"><?= $row->fakultas_terakhir ?></td>
                    <td class="px-4 py-3"><?= $row->prodi_terakhir ?></td>
                    <td class="px-4 py-3"><?= $row->tahun_lulus ?></td>
                    <td class="px-4 py-3"><?= $row->nim_terakhir ?></td>
                    <td class="px-4 py-3"><?= $row->ipk ?></td>
                    <td class="px-4 py-3"><?= $row->predikat ?></td>
                    <td class="px-4 py-3 whitespace-nowrap"><?= $row->no_hp ?></td>
                    <td class="px-4 py-3"><?= $row->sk_dasar ?></td>
                    <td class="px-4 py-3"><?= $row->periode_semester ?></td>
                    <td class="px-4 py-3"><?= $row->tahun_ajaran ?></td>
                    <td class="berkas px-4 py-3 max-w-[200px] overflow-hidden text-ellipsis bg-blue-50 sticky right-0"><a
                        class="text-blue-800 underline font-semibold" href="<?= $row->url_berkas ?>">Buka Berkas</a></td>
                  </tr>
                  <?php
                endforeach;
                ?>
              <?php else: ?>
                <tr>
                  <td colspan="15" class="text-center text-gray-400 py-6">Tidak ada data yang tersedia</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>

</body>

</html>