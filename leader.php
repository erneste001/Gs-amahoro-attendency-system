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
            --main-font: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            --main-width: 85%;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
    font-family: 'Calibri', sans-serif;
            background: var(--color-light-bg);
            color: var(--color-dark-text);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 40px;
            padding-bottom: 40px;
            font-size: 15px;
        }

        .app-container {
            width: var(--main-width);
            max-width: 1200px;
            background:rgba(41, 2, 81,0.3);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-soft);
            display: flex;
            min-height: calc(100vh - 80px);
            position:relative;
        }
       .app-container::before{
        pointer-events: none;
        content:"";
        width:100%;
        height:100%;
        position:absolute;
        background:blue;
        top:0;
        left:0;
        opacity:10%;
       }
        .sidebar {
            width: 200px;
            background: var(--color-sidebar-bg);
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
            border-radius: var(--border-radius);
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
            display: flex;
            flex-direction: column;
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
        }

        .nav-btn.active {
            background: var(--color-accent-yellow);
            border-color: var(--color-accent-yellow);
            color: var(--color-dark-text);
            font-weight: 600;
        }

        .btn-primary {
            background: var(--color-dark-text);
            border-color: var(--color-dark-text);
            color: var(--color-light-bg);
            margin-left: 15px;
            cursor: pointer;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-widget {
            background: var(--color-light-bg);
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

        .circle-text-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--color-dark-text);
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
            <div class="sidebar-logo" style="color: var(--color-accent-yellow);">ATTENDANCE   SYSTEM</div>
            <ul class="sidebar-menu">
                <li><a href="#" class="active"><i class="fas fa-chart-bar"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-calendar-check"></i> Daily Log</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Students</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </div>

        <div class="dashboard-content">
            
            <header class="dashboard-header">
                <h1 class="header-title">Level Attendance Overview</h1>
                
                <div style="display: flex; align-items: center;">
                    <nav class="time-navigation">
                        <button class="nav-btn active">Today</button>
                        <button class="nav-btn">Last Week</button>
                        <button class="nav-btn">Month</button>
                    </nav>
                    <button type="button" class="btn-primary" onclick="location.href='index.php'">back Home</button>
                </div>
            </header>

            <main class="dashboard-main">
                
                <section class="stats-grid">
                    <div class="stat-widget">
                        <div class="value" style="color: var(--color-accent-yellow);">0%</div>
                        <div class="label">Overall Attendance</div>
                    </div>
                    <div class="stat-widget">
                        <div class="value" style="color: var(--color-accent-blue);">1,250</div>
                        <div class="label">Total Enrollment</div>
                    </div>
                    <div class="stat-widget">
                        <div class="value" style="color: var(--color-accent-red);">0%</div>
                        <div class="label">Total Absence Rate</div>
                    </div>
                </section>
                
                <h2 class="section-title">Performance by Educational Level</h2>

                <div class="leaderboard-grid">
                    
                    <section class="level-card">
                        <div class="level-header">Primary Level (Grades 1-5)</div>
                        <div class="card-metrics">
                            <div class="progress-circle-wrapper">
                                <svg width="100" height="100" viewBox="0 0 100 100" class="circle-svg">
                                    <circle class="circle-track" cx="50" cy="50" r="40"></circle>
                                    <circle class="circle-progress" cx="50" cy="50" r="40" data-progress="93.2" style="stroke-dashoffset: 17.08;"></circle>
                                </svg>
                                <span class="circle-text-center" style="color: var(--color-accent-blue);">0</span>
                            </div>

                            <div class="detail-stats">
                                <div class="detail-item">
                                    <span class="detail-label">Total Students</span>
                                    <span class="detail-value">600</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Tardiness Rate</span>
                                    <span class="detail-value" style="color: var(--color-accent-yellow);">5.1%</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Unexcused Absences</span>
                                    <span class="detail-value" style="color: var(--color-accent-red);">18</span>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p>Action: Monitor morning check-in process.</p>
                            <button class="btn-small" style="background: var(--color-dark-text); color: white; border:none; padding: 6px 12px; border-radius: 4px;">View Details</button>
                        </footer>
                    </section>

                    <section class="level-card">
                        <div class="level-header">Pre-Primary Level (K-Prep)</div>
                        <div class="card-metrics">
                            <div class="progress-circle-wrapper">
                                <svg width="100" height="100" viewBox="0 0 100 100" class="circle-svg">
                                    <circle class="circle-track" cx="50" cy="50" r="40"></circle>
                                    <circle class="circle-progress" cx="50" cy="50" r="40" data-progress="88.5" style="stroke-dashoffset: 28.89;"></circle>
                                </svg>
                                <span class="circle-text-center" style="color: var(--color-accent-red);">0%</span>
                            </div>

                            <div class="detail-stats">
                                <div class="detail-item">
                                    <span class="detail-label">Total Students</span>
                                    <span class="detail-value">250</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Tardiness Rate</span>
                                    <span class="detail-value" style="color: var(--color-accent-yellow);">0%</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Unexcused Absences</span>
                                    <span class="detail-value" style="color: var(--color-accent-red);">0</span>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p>Action: High risk. Contact parents immediately.</p>
                            <button class="btn-small" style="background: var(--color-dark-text); color: white; border:none; padding: 6px 12px; border-radius: 4px;">View Details</button>
                        </footer>
                    </section>

                    <section class="level-card">
                        <div class="level-header">Secondary Level (Grades 9-12)</div>
                        <div class="card-metrics">
                            <div class="progress-circle-wrapper">
                                <svg width="100" height="100" viewBox="0 0 100 100" class="circle-svg">
                                    <circle class="circle-track" cx="50" cy="50" r="40"></circle>
                                    <circle class="circle-progress" cx="50" cy="50" r="40" data-progress="98.1" style="stroke-dashoffset: 4.77;"></circle>
                                </svg>
                                <span class="circle-text-center" style="color: var(--color-accent-blue);">0%</span>
                            </div>

                            <div class="detail-stats">
                                <div class="detail-item">
                                    <span class="detail-label">Total Students</span>
                                    <span class="detail-value">400</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Tardiness Rate</span>
                                    <span class="detail-value" style="color: var(--color-accent-yellow);">1.5%</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Unexcused Absences</span>
                                    <span class="detail-value" style="color: var(--color-accent-red);">0</span>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p>Action: Excellent attendance. Maintain support.</p>
                            <button class="btn-small" style="background: var(--color-dark-text); color: white; border:none; padding: 6px 12px; border-radius: 4px;">View Details</button>
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
        document.addEventListener('DOMContentLoaded', () => {
            const circles = document.querySelectorAll('.circle-progress');
            const radius = 40;
            const circumference = 2 * Math.PI * radius;

            circles.forEach(circle => {
                const progress = parseFloat(circle.getAttribute('data-progress'));
                const offset = circumference - (progress / 100) * circumference;
                
                setTimeout(() => {
                    circle.style.strokeDashoffset = offset;
                }, 100); 
            });
        });
        
history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1); 
};
history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1); 
};
    </script>
</body>
</html>