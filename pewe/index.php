<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>iFESTPHORIA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .hero {
            background-image: url("hero.jpg");
            background-size: cover;
            background-position: center;
            height: 700px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px;
            margin-bottom: 100px;
        }

        .search-box {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: -50px auto 50px;
            background-color: #8967b3;
            padding: 20px;
            border-radius: 10px;
            max-width: 900px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }

        .search-box input, .search-box select {
            padding: 15px;
            border-radius: 5px;
            border: none;
            margin-right: 10px;
            font-size: 16px;
        }

        .search-box button {
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            background-color: #f50057;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
       
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 0 50px 50px;
        }


        .event-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .event-card img {
            width: 100%;
            border-radius: 10px;
        }

        .event-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }

        .event-card p {
            color: black;
            text-align: justify;
        }

        .event-date {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #f50057;
            color: white;
            padding: 5px;
            border-radius: 5px;
            font-weight: bold;
        }
        .read-more-btn {
        color: #624e88;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .read-more-btn:hover {
        color: #503b72;
        text-decoration: underline;
    }
    .hidden-content {
        display: none;
        transition: all 0.3s ease-in-out;
        opacity: 0;
    }
    .hidden-content.show {
        display: inline;
        opacity: 1;
    }
    .hidden-event {
    display: none;  
}

.load-more-btn {
    display: block;
    width: 150px;
    margin: 0 auto 50px;
    padding: 10px 20px;
    text-align: center;
    background-color: #624e88;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    border: none;
}

.load-more-btn:hover {
    background-color: #503b72;
}
.show-less-btn {
    display: block;
    width: 150px;
    margin: 0 auto 50px;
    padding: 10px 20px;
    text-align: center;
    background-color: #624e88;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    border: none;
}

.show-less-btn:hover {
    background-color: #503b72;
}
.blog-section {
    background-color: #f4f4f4;
    padding: 50px;
    margin: 0 50px 50px;
    border-radius: 10px;
}

.blog-section h2 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

.blog-posts {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.post {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s, box-shadow 0.3s;
}

.post:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.post img {
    width: 100%;
    border-radius: 10px;
}

.post-info {
    text-align: center;
}

.post-info h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.post-info p {
    font-size: 14px;
    color: #333;
}
.post-date {
    display: block;
    font-size: 12px;
    color: #888;
    margin-top: 5px;
    text-align: left;
}
    </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="hero">
    </div>

    <div class="search-box">
        <input type="text" id="searchText" placeholder="Search Event" />
        <select id="facultyFilter">
            <option value="">Semua Fakultas</option>
            <option value="FT">FT</option>
            <option value="FEB">FEB</option>
            <option value="FMIPA">FMIPA</option>
            <option value="FISIPOL">FISIPOL</option>
            <option value="VOKASI">VOKASI</option>
            <option value="FBS">FBS</option>
        </select>
        <input type="date" id="dateFilter" />
        <button onclick="filterEvents()">Search</button>
    </div>
    <div class="events-grid">
        <a href="JPC.php" class="event-card FBS ">
            <img src="JPC.png" alt="JPC Event" />
            <div class="event-date 2024-04-14 ">APR 14</div>
            <h3>JPC Unesa</h3>
            <p>
                JPC merupakan sebuah festival Jepang yang diadakan oleh Himpunan Mahasiswa Pendidikan Bahasa dan Sastra Jepang Universitas Negeri Surabaya.
                <span id="jpcMore" style="display: none;">
                    Festival ini merupakan acara tahunan yang menyajikan berbagai kebudayaan Jepang yang sangat unik. Selain itu, terdapat juga serangkaian lomba yang diadakan untuk siswa SMA dan Umum. Festival Japan Pop Culture selalu ditunggu-tunggu oleh penggemar budaya Jepang di seluruh pulau Jawa.
                </span>
            </p>
            <button class="read-more-btn" onclick="showMore('jpcMore', this, event)">Baca Selengkapnya</button>
        </a>

        <a href="weekfest.php" class="event-card FEB">
            <img src="weekfest.jpg" alt="Week Fest Event" />
            <div class="event-date">AUG 20</div>
            <h3>WEEK FEST 2023</h3>
            <p>
                Week Fest adalah acara tahunan menarik yang diselenggarakan oleh Fakultas Ekonomika dan Bisnis, Universitas Negeri Surabaya.
                <span id="weekfestMore" style="display: none;">
                    Acara ini menampilkan berbagai aktivitas, termasuk konser dengan penampilan dari bintang tamu dan komedian terkenal. Tujuan dari acara ini adalah untuk mengumpulkan mahasiswa dan pengunjung dalam pengalaman yang tak terlupakan yang dipenuhi dengan hiburan dan musik, menjadikannya salah satu sorotan dalam kalender tahunan universitas.
                </span>
            </p>
            <button class="read-more-btn" onclick="showMore('weekfestMore', this,event)">Baca Selengkapnya</button>
        </a>

        <a href="eso.php" class="event-card FT">
            <img src="eso.jpg" alt="ESO Cup Event" />
            <div class="event-date">SEP 18</div>
            <h3>ESO CUP</h3>
            <p>
                Eso Cup adalah kompetisi olahraga yang diselenggarakan oleh Fakultas Teknik, Universitas Negeri Surabaya.
                <span id="esoMore" style="display: none;">
                    Terdapat cabang olahraga basket, futsal, voli, badminton serta e-sport. Acara ini juga memfasilitasi dukungan yang antusias dari para supporter. Dengan tujuan untuk meningkatkan semangat sportivitas, Eso Cup menjadi momen yang dinantikan oleh seluruh civitas akademika.
                </span>
            </p>
            <button class="read-more-btn" onclick="showMore('esoMore', this, event)">Baca Selengkapnya</button>
        </a>

        <a href="xproject.php" class="event-card FT">
            <img src="xproject.jpg" alt="X-Project Event" />
            <div class="event-date">SEP 22</div>
            <h3>X-PROJECT 2024</h3>
            <p>
                X-PROJECT IF adalah acara mahasiswa yang diadakan oleh Fakultas Teknik, khususnya Teknik Informatika, Universitas Negeri Surabaya.
                <span id="xprojectMore" style="display: none;">
                    Acara ini mencakup banyak kegiatan seperti bootcamp untuk meningkatkan keterampilan, serta webinar yang menghadirkan narasumber ahli di bidang teknologi dan informatika. Dengan tujuan untuk mendorong inovasi dan kreativitas, XPROJECT IF menjadi platform bagi mahasiswa untuk menunjukkan bakat dan pengetahuan mereka dalam proyek-proyek teknologi.
                </span>
            </p>
            <button class="read-more-btn" onclick="showMore('xprojectMore', this, event)">Baca Selengkapnya</button>
        </a>
    </div>
    <button class="load-more-btn" onclick="loadMore()">Load More</button>
<button class="show-less-btn" onclick="showLess()" style="display: none;">Show Less</button>
<script>
    function filterEvents() {
     const searchText = document.getElementById("searchText").value.toLowerCase();
     const facultyFilter = document.getElementById("facultyFilter").value;
     const dateFilter = document.getElementById("dateFilter").value; 
     const eventCards = document.querySelectorAll(".event-card");
 
     function formatDateToMonthDay(isoDate) {
         const date = new Date(isoDate);
         const monthNames = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
         const month = monthNames[date.getMonth()];
         const day = date.getDate();
         return `${month} ${day.toString().padStart(2, '0')}`;
     }
 
     let visibleEvents = 0; // Counter for visible events after filtering
     eventCards.forEach(card => {
         const title = card.querySelector("h3").textContent.toLowerCase();
         const description = card.querySelector("p").textContent.toLowerCase();
         const eventDateText = card.querySelector(".event-date").textContent.trim(); 
 
         const dateFilterFormatted = dateFilter ? formatDateToMonthDay(dateFilter) : null;
 
         let matchesSearchText = title.includes(searchText) || description.includes(searchText);
         let matchesFaculty = !facultyFilter || card.classList.contains(facultyFilter);
         let matchesDate = !dateFilter || eventDateText === dateFilterFormatted; 
 
         if (matchesSearchText && matchesFaculty && matchesDate) {
             card.style.display = "block";
             visibleEvents++;
         } else {
             card.style.display = "none";
         }
     });
     if (visibleEvents > 3) {
         document.querySelector('.load-more-btn').style.display = 'none';
         document.querySelector('.show-less-btn').style.display = 'block';
     } else {
         document.querySelector('.load-more-btn').style.display = 'none';
         document.querySelector('.show-less-btn').style.display = 'none';
     }
 
     // If any filters are applied, hide both buttons
     if (searchText || facultyFilter || dateFilter) {
         document.querySelector('.load-more-btn').style.display = 'none';
         document.querySelector('.show-less-btn').style.display = 'none';
     }
 }
 </script>
 
 <script>
     function loadMore() {
         var hiddenEvents = document.querySelectorAll('.hidden-event');
         hiddenEvents.forEach(function(event) {
             event.style.display = 'block'; 
         });
         document.querySelector('.load-more-btn').style.display = 'none';  
         document.querySelector('.show-less-btn').style.display = 'block'; 
     }
 
     function showLess() {
         var hiddenEvents = document.querySelectorAll('.hidden-event');
         hiddenEvents.forEach(function(event) {
             event.style.display = 'none';  
         });
         document.querySelector('.show-less-btn').style.display = 'none';  
         document.querySelector('.load-more-btn').style.display = 'block';  
     }
 
     document.addEventListener("DOMContentLoaded", function() {
         const eventCards = document.querySelectorAll(".event-card");
         if (eventCards.length > 3) {
             for (let i = 3; i < eventCards.length; i++) {
                 eventCards[i].classList.add("hidden-event");
                 eventCards[i].style.display = 'none';
             }
             document.querySelector('.load-more-btn').style.display = 'block';
             document.querySelector('.show-less-btn').style.display = 'none';
         } else {
             document.querySelector('.load-more-btn').style.display = 'none';
             document.querySelector('.show-less-btn').style.display = 'none';
         }
     });
     function showMore(id, btn, event) {
          event.preventDefault(); 
          var moreText = document.getElementById(id);
          if (moreText.style.display === "none") {
              moreText.style.display = "inline";
              btn.textContent = "Baca Lebih Sedikit";
          } else {
              moreText.style.display = "none";
              btn.textContent = "Baca Selengkapnya";
          }
      }
      document.addEventListener("DOMContentLoaded", function() {
});
 </script>
 
<div class="blog-section">
    <h2>All Blog Posts</h2>
    <div class="blog-posts">
        <a href="post1.html" class="post">
            <img src="blog1.jpg" alt="Blog Post 1" />
            <div class="post-info">
                <span class="post-date">1 Jan 2024</span>
                <h3>Event "SENGKUNI": Pameran Seni, Lomba Karya, dan Pertunjukan Spektakuler!</h3>
            </div>
        </a>
        <a href="post2.html" class="post">
            <img src="blog2.jpg" alt="Blog Post 2" />
            <div class="post-info">
                <span class="post-date">20 Mei 2024</span>
                <h3>Pemilihan Putra Putri Unesa: Audisi Duta Kampus, Tampilkan Bakat dan Skill Finalis</h3>
                
            </div>
        </a>
        <a href="post3.html" class="post">
            <img src="blog3.jpg" alt="Blog Post 3" />
            <div class="post-info">
                <span class="post-date">12 Sep 2024</span>
                <h3>"Pekan Raya Mahasiswa Unesa" Meriah dengan Penampilan Spektakuler Dewa 19, Rayakan Kreativitas dan Prestasi Mahasiswa!</h3>
            </div>
        </a>
    </div>
</div>
<?php include "footer.html" ?>
</body>
</html>