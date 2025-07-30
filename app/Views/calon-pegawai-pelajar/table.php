<?php

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <style>
    /* General resets and base styles */
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body,
    html {
      margin: 0;
      padding: 0;
      background-color: #d0d0d0;
      height: 100vh;
      display: flex;
      min-width: 960px;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    /* Sidebar */
    nav.sidebar {
      background-color: #2b2fc0;
      color: white;
      width: 240px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 10px 20px 30px;
    }

    nav.sidebar .title {
      font-weight: 700;
      font-size: 24px;
      padding: 0 0 10px 0;
      border-bottom: 1px solid rgba(255 255 255 / 0.3);
      user-select: none;
    }

    nav.sidebar ul.nav-links {
      list-style: none;
      padding: 0;
      margin: 40px 0 0 0;
    }

    nav.sidebar ul.nav-links li {
      margin-bottom: 20px;
    }

    nav.sidebar ul.nav-links li a {
      display: flex;
      align-items: center;
      font-size: 16px;
      font-weight: 500;
      color: white;
      user-select: none;
      gap: 12px;
      transition: color 0.3s ease;
    }

    nav.sidebar ul.nav-links li a:hover {
      color: #c5c5ff;
    }

    nav.sidebar ul.nav-links li a svg.icon {
      width: 20px;
      height: 20px;
      fill: white;
      min-width: 20px;
    }

    nav.sidebar .logout {
      font-size: 16px;
      font-weight: 500;
      user-select: none;
      display: flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
      fill: white;
      user-select: none;
      padding-top: 15px;
      border-top: 1px solid rgba(255 255 255 / 0.3);
    }

    nav.sidebar .logout svg.icon {
      width: 24px;
      height: 24px;
      min-width: 24px;
      flex-shrink: 0;
    }

    /* Main container */
    main.container {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      padding: 24px 30px 30px 30px;
      max-width: 80%;
    }

    /* Top header info bar */
    header.top-header-info {
      background-color: #2b2fc0;
      border-radius: 8px;
      height: 64px;
      display: flex;
      align-items: center;
      color: white;
      padding: 10px 24px;
      justify-content: space-between;
      user-select: none;
      margin-bottom: 20px;
      font-size: 14px;
      font-weight: 700;
    }

    header.top-header-info .left-section {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-grow: 1;
      overflow: hidden;
    }

    /* briefcase icon container */
    header.top-header-info .left-section svg.icon {
      width: 20px;
      height: 20px;
      min-width: 20px;
      fill: white;
    }

    header.top-header-info .left-section .text {
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
      font-weight: 600;
    }

    /* right user info */
    header.top-header-info .right-section {
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 700;
      font-size: 15px;
      min-width: 230px;
      justify-content: flex-end;
    }

    header.top-header-info .right-section .subtext {
      font-weight: 400;
      font-size: 12px;
      margin-top: 4px;
      color: #d0d0ffcc;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      user-select: none;
    }

    /* User icon circle */
    header.top-header-info .right-section .user-icon {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    header.top-header-info .right-section .user-icon svg.icon {
      width: 26px;
      height: 26px;
      fill: #2b2fc0;
    }

    /* Table container */
    section.table-container {
      background-color: white;
      border-radius: 8px;
      padding: 20px 24px 24px 24px;
      box-shadow: 0 0 6px rgb(0 0 0 / 0.1);
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    /* Table header + buttons row */
    section.table-container .table-header {
      display: flex;
      justify-content: space-between;
      align-items: start;
      margin-bottom: 4px;
      flex-wrap: wrap;
      gap: 18px;
    }

    section.table-container .table-header .title-block {
      min-width: 280px;
    }

    section.table-container .table-header .title-block .title-text {
      font-weight: 700;
      font-size: 18px;
      user-select: none;
      margin-bottom: 2px;
    }

    section.table-container .table-header .title-block .subtitle-text {
      font-weight: 400;
      font-size: 13px;
      color: #777777;
      user-select: none;
    }

    section.table-container .table-header .actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      align-items: center;
    }

    /* Buttons on top right */
    button,
    .icon-button {
      font-family: inherit;
      font-weight: 600;
      font-size: 13px;
      border: none;
      padding: 7px 14px;
      border-radius: 6px;
      color: #2b2fc0;
      background-color: transparent;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      user-select: none;
      transition: all 0.25s ease;
      box-sizing: border-box;
      border: 1.3px solid #2b2fc0;
    }

    button:hover,
    .icon-button:hover {
      background-color: #2b2fc0;
      color: white;
      border-color: #2b2fc0;
    }

    /* Export button and Filters button with icons */
    .icon-button svg.icon {
      width: 18px;
      height: 18px;
      fill: currentColor;
      flex-shrink: 0;
    }

    /* Add new CTA button style */
    button.primary-btn {
      background-color: #2b2fc0;
      color: white;
      border-color: #2b2fc0;
      font-weight: 700;
      padding: 8px 20px;
    }

    button.primary-btn:hover {
      background-color: #222bb0;
    }

    /* Table area */
    .table-wrapper {
      overflow-x: auto;
      border-radius: 8px;
    }

    table.data-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      font-size: 13px;
      color: #555555;
      user-select: none;
      min-width: 960px;
    }

    thead tr th {
      border-bottom: 1px solid #d5d5d5;
      position: sticky;
      top: 0;
      z-index: 1;
      background-color: white;
    }

    thead tr th.berkas {
      position: sticky;
      right: 0;
      background-color: #f8faff;
    }

    thead th {
      text-align: left;
      padding: 12px 16px 11px 16px;
      font-weight: 700;
      font-size: 13px;
      color: #3d3d3d;
      white-space: nowrap;
      cursor: pointer;
    }

    thead th:hover {
      background-color: #f0f0ff;
    }

    thead th .sort-indicator {
      margin-left: 6px;
      font-size: 9px;
      user-select: none;
      display: inline-block;
      vertical-align: middle;
      color: #666666;
      transition: transform 0.3s ease;
    }

    thead th.sorted-asc .sort-indicator {
      transform: rotate(180deg);
      color: #2b2fc0;
    }

    thead th.sorted-desc .sort-indicator {
      color: #2b2fc0;
    }

    tbody tr {
      border-bottom: 1px solid #ececec;
      transition: background-color 0.15s ease;
    }

    tbody tr:hover {
      background-color: #f8faff;
    }

    tbody td {
      padding: 11px 16px 11px 16px;
      vertical-align: top;
      white-space: nowrap;
    }

    tbody td.berkas {
      word-break: break-all;
      max-width: 200px;
      overflow: hidden;
      text-overflow: ellipsis;
      position: sticky;
      right: 0;
      background-color: #f8faff;
    }

    tbody td.bold-text {
      font-weight: 600;
      color: #1a1a1a;
    }

    /* Status badge style */
    .badge {
      padding: 3px 8px;
      border-radius: 12px;
      font-size: 11px;
      font-weight: 700;
      color: white;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      user-select: none;
      min-width: 50px;
      justify-content: center;
    }

    .badge.active {
      background-color: #3cd280cc;
      color: #167d47;
    }

    .badge.inactive {
      background-color: #ff6c6ccc;
      color: #8b1f1f;
    }

    .badge::before {
      content: "";
      display: inline-block;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: currentColor;
      opacity: 0.8;
    }

    /* Bottom border line for table container and progress line */
    .bottom-border-container {
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .bottom-border-container .line {
      height: 4px;
      border-radius: 4px 4px 0 0;
      background-color: #2b2fc0;
    }

    .bottom-border-container .line.left {
      width: 116px;
    }

    .bottom-border-container .line.right {
      width: 300px;
      background-color: transparent;
      border: 4px solid #2b2fc0;
      border-bottom-color: transparent;
      border-radius: 4px 4px 0 0;
    }

    a.berkas {
      color: #2b2fc0;
      text-decoration: underline;
      font-weight: 600;
    }
  </style>
</head>

<body>

  <nav class="sidebar" aria-label="Main navigation">
    <div>
      <div class="title" aria-label="Admin panel title">ADMIN</div>
      <ul class="nav-links" role="menu" aria-label="Primary navigation links">
        <li><a href="#" role="menuitem" tabindex="0">
            <svg class="icon" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
              <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
            </svg>
            Dashboard
          </a></li>
        <li><a href="#" role="menuitem" tabindex="0">
            <svg class="icon" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
              <path
                d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-10l-6-6zm-1 10H8v-2h5v2zm3-5V3.5L18.5 8H16z" />
            </svg>
            Table Data
          </a></li>
        <li><a href="#" role="menuitem" tabindex="0">
            <svg class="icon" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
              <path
                d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-3.33 0-6 1.67-6 4v2h12v-2c0-2.33-2.67-4-6-4z" />
            </svg>
            Data Mahasiswa
          </a></li>
      </ul>
    </div>
    <div class="logout" role="button" tabindex="0" aria-label="Logout">
      <svg class="icon" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
        <path d="M16 13v-2H7v-3l-5 4 5 4v-3zM20 3h-8v2h8v14h-8v2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
      </svg>
      Logout
    </div>
  </nav>

  <main class="container" role="main" aria-label="Admin main content">
    <header class="top-header-info" aria-label="University and user information">
      <div class="left-section" title="University and degree">
        <svg class="icon" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
          <path
            d="M10.5 2A2.5 2.5 0 0 0 8 4.5v15A2.5 2.5 0 0 0 10.5 22h3a2.5 2.5 0 0 0 2.5-2.5v-15A2.5 2.5 0 0 0 13.5 2h-3zM9 17h6v1H9v-1zm0-3h6v1H9v-1zm6-5H9v1h6V9z" />
        </svg>
        <div class="text" aria-label="University name">Pascasarjana Universitas Lambung Mangkurat</div>
      </div>
      <div class="right-section" aria-label="Admin user information">
        <div>
          ADMIN PASCASARJANA
          <div class="subtext">adminexample@gmail.com</div>
        </div>
        <div class="user-icon" aria-hidden="true">
          <svg class="icon" viewBox="0 0 24 24">
            <path
              d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zM12 13.8c-3.9 0-7.2 2-7.2 4.8v1.2h14.4v-1.2c0-2.8-3.3-4.8-7.2-4.8z" />
          </svg>
        </div>
      </div>
    </header>

    <section class="table-container" aria-label="Mahasiswa data table section">
      <div class="table-header">
        <div class="title-block">
          <div class="title-text">Table Data </div>
          <div class="subtitle-text">Data Permohonan Penurunan SPP Pegawai Mitra Kerja</div>
        </div>
        <div class="actions">
          <!-- <button class="icon-button" aria-label="Delete">
            <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M3 6h18M9 6v12m6-12v12M10 11h4" />
            </svg>
            Delete
          </button>
          <button class="icon-button" aria-label="Filters">
            <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M3 4h18M10 12h4M6 20h12" />
            </svg>
            Filters
          </button> -->
          <button class="icon-button" aria-label="Export">
            <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
            Export
          </button>
          <button class="primary-btn" aria-label="Add new Call to Action">+ Add new CTA</button>
        </div>
      </div>

      <div class="table-wrapper">
        <table class="data-table" role="grid" aria-describedby="table-desc">
          <caption id="table-desc" class="sr-only" hidden>Data pembayaran pelepasan dan wisuda Mahasiswa</caption>
          <thead>
            <tr>
              <th scope="col" title="Nama column sorting" aria-sort="none" tabindex="0">
                No <span class="sort-indicator">▲</span>
              </th>
              <th scope="col" title="Nama column sorting" aria-sort="none" tabindex="0">
                Nama <span class="sort-indicator">▲</span>
              </th>
              <th scope="col" title="NIM column sorting" aria-sort="none" tabindex="0">
                No. Pendaftaran <span class="sort-indicator">▲</span>
              </th>
              <th scope="col" title="Program Studi column sorting" aria-sort="none" tabindex="0">
                Program Studi Pilihan <span class="sort-indicator">▲</span>
              </th>
              <th scope="col" title="Status column sorting" aria-sort="none" tabindex="0">
                Fakultas Terakhir <span class="sort-indicator">▲</span>
              </th>
              <th scope="col" title="Status column sorting" aria-sort="none" tabindex="0">
                Program Studi Terakhir <span class="sort-indicator">▲</span>
              </th>
              <th scope="col" title="Actions column sorting" aria-sort="none" tabindex="0">
                No. HP <span class="sort-indicator">▲</span>
              </th>
              <th scope="col" class="berkas" title="Status column sorting" aria-sort="none" tabindex="0">
                Berkas <span class="sort-indicator">▲</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $count = 0;
            foreach ($data as $row):
              ?>
              <tr>
                <td class="bold-text"><?= ++$count; ?></td>
                <td class="bold-text"><?= $row->nama; ?></td>
                <td><?= $row->no_tpa_nim ?></td>
                <td><?= $row->nama_prodi ?></td>
                <td><?= $row->fakultas_terakhir ?></td>
                <td><?= $row->prodi_terakhir ?></td>
                <td><?= $row->no_hp ?></td>
                <td class="berkas"><a class="berkas" href="<?= $row->url_berkas ?>">Buka Berkas</a></td>
              </tr>
              <?php
            endforeach;
            ?>
          </tbody>
        </table>
      </div>

      <div class="bottom-border-container" aria-hidden="true">
        <!-- <div class="line left"></div>
        <div class="line right"></div> -->
      </div>
    </section>
  </main>

</body>

</html>