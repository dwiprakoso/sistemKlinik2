<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV - {{ $resume->nama }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 24px;
            margin: 0;
        }
        .contact-info {
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        .content-item {
            margin-bottom: 15px;
        }
        .item-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .item-subtitle {
            font-style: italic;
            margin-bottom: 5px;
        }
        .item-date {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .item-description {
            font-size: 14px;
            line-height: 1.4;
        }
        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .skill-item {
            background-color: #f2f2f2;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 14px;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $resume->nama }}</h1>
    </div>
    
    <div class="contact-info">
        <p>
            {{ $resume->email }} | {{ $resume->telepon ?? '-' }} | {{ $resume->lokasi ?? '-' }}
        </p>
    </div>
    
    @if($resume->ringkasan)
    <div class="section">
        <div class="section-title">Ringkasan Profil</div>
        <p>{{ $resume->ringkasan }}</p>
    </div>
    @endif
    
    @if(count($pendidikan) > 0)
    <div class="section">
        <div class="section-title">Pendidikan</div>
        @foreach($pendidikan as $edu)
        <div class="content-item">
            <div class="item-title">{{ $edu->gelar }}</div>
            <div class="item-subtitle">{{ $edu->institusi }}</div>
            <div class="item-date">
                {{ \Carbon\Carbon::parse($edu->tahun_mulai)->format('M Y') }} - 
                {{ $edu->tahun_selesai ? \Carbon\Carbon::parse($edu->tahun_selesai)->format('M Y') : 'Sekarang' }}
            </div>
        </div>
        @endforeach
    </div>
    @endif
    
    @if(count($pengalamanKerja) > 0)
    <div class="section">
        <div class="section-title">Pengalaman Kerja</div>
        @foreach($pengalamanKerja as $exp)
        <div class="content-item">
            <div class="item-title">{{ $exp->posisi }}</div>
            <div class="item-subtitle">{{ $exp->perusahaan }}</div>
            <div class="item-date">
                {{ \Carbon\Carbon::parse($exp->tanggal_mulai)->format('M Y') }} - 
                {{ $exp->tanggal_selesai ? \Carbon\Carbon::parse($exp->tanggal_selesai)->format('M Y') : 'Sekarang' }}
            </div>
            <div class="item-description">{{ $exp->deskripsi }}</div>
        </div>
        @endforeach
    </div>
    @endif
    
    @if(count($pengalamanOrganisasi) > 0)
    <div class="section">
        <div class="section-title">Pengalaman Organisasi</div>
        @foreach($pengalamanOrganisasi as $org)
        <div class="content-item">
            <div class="item-title">{{ $org->posisi }}</div>
            <div class="item-subtitle">{{ $org->organisasi }}</div>
            <div class="item-date">
                {{ \Carbon\Carbon::parse($org->tanggal_mulai)->format('M Y') }} - 
                {{ $org->tanggal_selesai ? \Carbon\Carbon::parse($org->tanggal_selesai)->format('M Y') : 'Sekarang' }}
            </div>
            <div class="item-description">{{ $org->deskripsi }}</div>
        </div>
        @endforeach
    </div>
    @endif
    
    @if(count($sertifikat) > 0)
    <div class="section">
        <div class="section-title">Sertifikat</div>
        @foreach($sertifikat as $cert)
        <div class="content-item">
            <div class="item-title">{{ $cert->nama_sertifikat }}</div>
            <div class="item-subtitle">{{ $cert->penerbit }}</div>
            <div class="item-date">{{ \Carbon\Carbon::parse($cert->tanggal_terbit)->format('M Y') }}</div>
        </div>
        @endforeach
    </div>
    @endif
    
    @if(count($keahlian) > 0)
    <div class="section">
        <div class="section-title">Keterampilan</div>
        <div class="skills-list">
            @foreach($keahlian as $skill)
            <span class="skill-item">{{ $skill->nama_keahlian }}</span>
            @endforeach
        </div>
    </div>
    @endif
</body>
</html>