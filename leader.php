<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focused School Attendance System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        :root {
            --color-light-bg: #ffffff;
            --color-card-bg: #f9f9f9;
            --color-sidebar-bg: #f0f0f0;
            --color-dark-text: #111122;
            --color-text-secondary: #666677;
            --color-accent-yellow: #f1c40f;
            --color-accent-blue: #3498db;
            --color-accent-red: #e74c3c;
            --shadow-soft: 0 4px 12px rgba(0, 0, 0, 0.08);
            --border-radius: 12px;
            --main-font: 'Calibri', sans-serif; 
            --main-width: 85%;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--main-font);
            color: white !important;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 40px;
            padding-bottom: 40px;
            font-size: 16px;
        }



        .app-container {
            width: var(--main-width);
            max-width: 1200px;
            background: rgba(41, 2, 81, 0.3);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-soft);
            display: flex;
            min-height: calc(100vh - 80px);
            color: var(--color-dark-text);
        }

   

        .sidebar {
            width: 200px;
            background: white;
            padding: 20px 15px;
            flex-shrink: 0;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }

        .sidebar-logo {
            font-size: 10px;
            font-weight: 700;
            color: black;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--color-accent-yellow);
        }

        .sidebar-menu li {
            list-style: none;
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: block;
            color: var(--color-text-secondary);
            text-decoration: none;
            padding: 10px 10px;
            border-radius: 4px; 
            transition: background 0.2s, color 0.2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(241, 196, 15, 0.15);
            color: var(--color-dark-text);
        }

        .sidebar-menu i {
            margin-right: 10px;
        }

        .dashboard-content {
            flex-grow: 1;
            padding: 30px;
            position: relative;
            display: flex;
            flex-direction: column;
            background: var(--color-light-bg); 
            border-top-right-radius: var(--border-radius);
            border-bottom-right-radius: var(--border-radius);
        }
             .dashboard-content::before {
            pointer-events: none;
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            background: blue;
            top: 0;
            left: 0;
            opacity: 20%;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 25px;
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--color-dark-text); 
        }
        
        .time-navigation {
            display: flex;
            gap: 10px;
        }

        .nav-btn, .btn-primary {
            padding: 8px 14px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid rgba(0, 0, 0, 0.15);
            font-size: 0.9rem;
            background: var(--color-light-bg);
            color: var(--color-dark-text);
        }

        .nav-btn.active {
            background: var(--color-accent-yellow);
            border-color: var(--color-accent-yellow);
            color: var(--color-dark-text);
            font-weight: 600;
        }

        .btn-primary {
            border:none;
            border-color: var(--color-dark-text);
            color: rgba(11, 30, 151, 1);
            margin-left: 15px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-widget {
            background: var(--color-card-bg); 
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .stat-widget .value {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--color-accent-blue);
            margin-bottom: 5px;
        }

        .stat-widget:nth-child(1) .value {
            color: var(--color-accent-yellow);
        }

        .stat-widget:nth-child(3) .value {
            color: var(--color-accent-red); 
        }

        .stat-widget .label {
            font-size: 0.95rem;
            color: var(--color-text-secondary);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--color-dark-text);
            margin-bottom: 20px;
            border-left: 5px solid var(--color-accent-yellow);
            padding-left: 10px;
        }

        .leaderboard-grid {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .level-card {
            flex: 1;
            background: var(--color-light-bg);
            border-radius: var(--border-radius);
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .level-header {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--color-dark-text);
            margin-bottom: 15px;
        }
        
        .card-metrics {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .detail-stats {
            margin-left: 20px;
            flex-grow: 1;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.05);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-size: 0.85rem;
            color: var(--color-text-secondary);
        }

        .detail-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--color-dark-text);
        }
        
        .progress-circle-wrapper {
            width: 100px;
            height: 100px;
            flex-shrink: 0;
            position: relative;
        }

        .circle-svg {
            transform: rotate(-90deg);
        }

        .circle-track {
            fill: none;
            stroke: rgba(0, 0, 0, 0.1);
            stroke-width: 8;
        }

        .circle-progress {
            fill: none;
            stroke: var(--color-accent-blue);
            stroke-width: 8;
            stroke-dasharray: 251.2; 
            stroke-dashoffset: 251.2;
            transition: stroke-dashoffset 0.8s ease-in-out;
            stroke-linecap: round;
        }

        #pre-primary-circle .circle-progress {
            stroke: var(--color-accent-red);
        }
        #secondary-circle .circle-progress {
            stroke: var(--color-accent-blue);
        }
        #primary-circle .circle-progress {
            stroke: var(--color-accent-yellow);
        }
        
        .circle-text-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--color-dark-text);
        }

        .card-footer {
            margin-top: auto; 
            padding-top: 15px;
            border-top: 1px dashed rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-footer p {
            font-size: 0.8rem;
            color: var(--color-text-secondary);
        }

        .dashboard-footer-text {
            text-align: center;
            margin-top: auto;
            padding-top: 20px;
            font-size: 0.85rem;
            color: var(--color-text-secondary);
            border-top: 1px solid rgba(0, 0, 0, 0.08);
        }
   
    
    </style>
</head>
<body>
    
    <div class="app-container">
        
        <div class="sidebar">
            <div class="sidebar-logo" style="color: var(--color-accent-yellow);">ATTENDANCE SYSTEM</div>
            <ul class="sidebar-menu">
              <li><a href="#" class="active"><i class="fas fa-arrow-right"></i> Dashboard</a></li>
<li><a href="#"><i class="fas fa-arrow-right"></i> Daily Log</a></li>
<li><a href="#"><i class="fas fa-arrow-right"></i> Students</a></li>
<li><a href="#"><i class="fas fa-arrow-right"></i> Settings</a></li>

            </ul>
        </div>

        <div class="dashboard-content">
            
            <header class="dashboard-header">
                <h1 class="header-title">Level Attendance Overview</h1>
                
                <div style="display: flex; align-items: center;">
                    <nav class="time-navigation">
                        <button class="nav-btn active" style="border:none; background:#3498db; width:120px; color:white; height:40px;">Today</button>
                        <button class="nav-btn" style="border:none";>Last Week</button>
                        <button class="nav-btn" style="border:none">Month</button>
                    </nav>
                    <button type="button" class="btn-primary" onclick="location.href='index.php'">Back home <i class="fa-solid fa-arrow-right"></i></button> 
                </div>
            </header>

            <main class="dashboard-main">
                
                <section class="stats-grid">
                    <div class="stat-widget">
                        <div id="overAll" class="value">0%</div>
                        <div class="label">Overall Attendance</div>
                    </div>
                    <div class="stat-widget">
                        <div class="value" style="color: var(--color-accent-blue);">1,250</div>
                        <div class="label">Total Enrollment</div>
                    </div>
                    <div class="stat-widget">
                        <div id="oveAll" class="value">0%</div>
                        <div class="label">Total Absence Rate</div>
                    </div>
                </section>
                
                <h2 class="section-title">Performance by Educational Level</h2>

                <div class="leaderboard-grid">
                    
                    <section class="level-card">
                        <div class="level-header">Primary Level (Grades 1-5)</div>
                        <div class="card-metrics">
                            <div class="progress-circle-wrapper" id="primary-circle">
                                <svg width="100" height="100" viewBox="0 0 100 100" class="circle-svg">
                                    <circle class="circle-track" cx="50" cy="50" r="40"></circle>
                                    <circle class="circle-progress" cx="50" cy="50" r="40"></circle>
                                </svg>
                                <span id="primaryPercentage" class="circle-text-center" style="color: var(--color-accent-yellow); font-size:17px;">0%</span>
                            </div>

                            <div class="detail-stats">
                                <div class="detail-item">
                                    <span class="detail-label">Total Students</span>
                                    <span class="detail-value">600</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Present Today</span>
                                    <span id="primaryPresentCount" class="detail-value" style="color: var(--color-accent-yellow);">0</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Absent Today</span>
                                    <span id="primaryAbsentCount" class="detail-value" style="color: var(--color-accent-red);">0</span>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p>Action: Monitor morning check-in process.</p>
                            <!--<button class="btn-small" style="background: var(--color-dark-text); color: white; border:none; padding: 6px 12px; border-radius: 4px;">View Details</button>-->
                        </footer>
                    </section>

                    <section class="level-card">
                        <div class="level-header">Pre-Primary Level (K-Prep)</div>
                        <div class="card-metrics">
                            <div class="progress-circle-wrapper" id="pre-primary-circle">
                                <svg width="100" height="100" viewBox="0 0 100 100" class="circle-svg">
                                    <circle class="circle-track" cx="50" cy="50" r="40"></circle>
                                    <circle class="circle-progress" cx="50" cy="50" r="40"></circle>
                                </svg>
                                <span id="prePercentage" class="circle-text-center" style="color: var(--color-accent-red); font-size:17px;">0%</span>
                            </div>

                            <div class="detail-stats">
                                <div class="detail-item">
                                    <span class="detail-label">Total Students</span>
                                    <span class="detail-value">250</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Present Today</span>
                                    <span id="prePrimaryPresentCount" class="detail-value" style="color: var(--color-accent-yellow);">0</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Absent Today</span>
                                    <span id="prePrimaryAbsentCount" class="detail-value" style="color: var(--color-accent-red);">0</span>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p>Action: High risk. Contact parents immediately.</p>
                            <!--<button class="btn-small" style="background: var(--color-dark-text); color: white; border:none; padding: 6px 12px; border-radius: 4px;">View Details</button>-->
                        </footer>
                    </section>

                    <section class="level-card">
                        <div class="level-header">Secondary Level (Grades 9-12)</div>
                        <div class="card-metrics">
                            <div class="progress-circle-wrapper" id="secondary-circle">
                                <svg width="100" height="100" viewBox="0 0 100 100" class="circle-svg">
                                    <circle class="circle-track" cx="50" cy="50" r="40"></circle>
                                    <circle class="circle-progress" cx="50" cy="50" r="40"></circle>
                                </svg>
                                <span id="secondaryPercentage" class="circle-text-center" style="color: var(--color-accent-blue); font-size:17px;">0%</span>
                            </div>

                            <div class="detail-stats">
                                <div class="detail-item">
                                    <span class="detail-label">Total Students</span>
                                    <span class="detail-value">400</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Present Today</span>
                                    <span id="secondaryPresentCount" class="detail-value" style="color: var(--color-accent-yellow);">0</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Absent Today</span>
                                    <span id="secondaryAbsentCount" class="detail-value" style="color: var(--color-accent-red);">0</span>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p>Action: Excellent attendance. Maintain support.</p>
                           <!-- <button class="btn-small" style="background: var(--color-dark-text); color: white; border:none; padding: 6px 12px; border-radius: 4px;">View Details</button>-->
                        </footer>
                    </section>
                </div>
                
                <p class="dashboard-footer-text">
                    This data is based on real-time attendance logging as of today.
                </p>
            </main>
        </div>
    </div>
    
    <script>
const animateCircle = (percentage, elementId) => {
    const wrapper = document.getElementById(elementId);
    if (!wrapper) return;

    const circle = wrapper.querySelector('.circle-progress');
    const textElement = wrapper.querySelector('.circle-text-center');
    const radius = 40;
    const circumference = 2 * Math.PI * radius;
    
    circle.style.strokeDasharray = circumference;
    circle.style.strokeDashoffset = circumference;

    let progress = 0;
    const duration = 1000; 
    const start = performance.now();

    const frame = (time) => {
        const elapsed = time - start;
        let p = Math.min(1, elapsed / duration);
        progress = percentage * p;

        circle.style.strokeDashoffset = circumference * (1 - progress / 100);
        textElement.textContent = progress.toFixed(1) + "%";

        if (p < 1) {
            requestAnimationFrame(frame);
        } else {
            textElement.textContent = percentage.toFixed(1) + "%";
        }
    };
    requestAnimationFrame(frame);
};

const levels = [
    { name: "Primary", total: 600, presentId: "primaryPresentCount", absentId: "primaryAbsentCount", percentId: "primaryPercentage", circleId: "primary-circle" },
    { name: "Pre-primary", total: 250, presentId: "prePrimaryPresentCount", absentId: "prePrimaryAbsentCount", percentId: "prePercentage", circleId: "pre-primary-circle" },
    { name: "Secondary", total: 400, presentId: "secondaryPresentCount", absentId: "secondaryAbsentCount", percentId: "secondaryPercentage", circleId: "secondary-circle" }
];

let totalPresent = 0;
let totalAbsent = 0;
const totalEnrollment = levels.reduce((sum, level) => sum + level.total, 0);


levels.forEach(level => {
    const presentRate = Number(localStorage.getItem(`presents-${level.name}`)) || 0;
    const absentRate = Number(localStorage.getItem(`absents-${level.name}`)) || 0;

    document.getElementById(level.presentId).textContent = presentRate;
    document.getElementById(level.absentId).textContent = absentRate;

    const attendancePercentage = level.total > 0 ? (presentRate * 100) / level.total : 0;
    
    animateCircle(attendancePercentage, level.circleId);

    totalPresent += presentRate;
    totalAbsent += absentRate;
});

const overallPercentage = totalEnrollment > 0 ? (totalPresent * 100) / totalEnrollment : 0;
document.getElementById("overAll").textContent = overallPercentage.toFixed(1) + "%";

const overallAbsentPercentage = totalEnrollment > 0 ? (totalAbsent * 100) / totalEnrollment : 0;
document.getElementById("oveAll").textContent = overallAbsentPercentage.toFixed(1) + "%";


    </script>
</body>
</html>