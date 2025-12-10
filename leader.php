<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="leader.css">
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="board.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
  </head>
  <body>
    <div class="times">
      <div class="time">
        <div>
          <li
            style="
              padding-top: 30px;
              color: white;
              font-size: 20px;
              padding-left: 30px;
            "
          >
            Track leaderboard
          </li>
        </div>
        <div class="check-time">
          <li class="time-level">
            <i id="icons" class="fa-solid fa-wand-magic-sparkles"></i>Daily
          </li>
          <li class="time-level">
            <i id="icons" class="fa-brands fa-weebly"></i>Weekely
          </li>
          <li class="time-level">
            <i id="icons" class="fa-solid fa-ear-deaf"></i>Years
          </li>
        </div>
        <div class="other">
          <button class="other-choices">Other choices</button>
          <button class="back">Back Home</button>
        </div>
      </div>
      <h2
        id="typeText"
        style="
          text-align: center;
          font-size: 35px;
          background: linear-gradient(
            rgb(214, 223, 213),
            rgb(200, 222, 194),
            rgb(146, 154, 190)
          );
          -webkit-background-clip: text;
          background-clip: text;
          -webkit-text-fill-color: transparent;
        "
      ></h2>
      <div class="leaderBoard">
        <div class="primary">
          <div class="primary-info">
            <li>you can even display this on graph</li>
            <button>display on graph</button>
          </div>
          <div class="average">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                class="relativer"
                cx="60"
                cy="60"
                r="50"
                stroke-width="10"
                stroke="rgb(245, 245, 245)"
              />

              <circle
                class="absoluter"
                cx="60"
                cy="60"
                r="50"
                stroke-width="10"
                transform="rotate(90 60 60)"
                stroke="rgb(45, 5, 245)"
              ></circle>
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
          <div class="absent">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                cx="60"
                cy="60"
                r="50"
                stroke-width="5"
                stroke="rgb(245, 245, 245)"
              />
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
          <div class="present">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                cx="60"
                cy="60"
                r="50"
                stroke-width="5"
                stroke="rgb(245, 245, 245)"
              />
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
        </div>
        <div class="pre-primary">
          <div class="primary-info">
            <li>you can even display this on graph</li>
            <button>display on graph</button>
          </div>
          <div class="average">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                cx="60"
                cy="60"
                r="50"
                stroke-width="5"
                stroke="rgb(245, 245, 245)"
              />
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
          <div class="absent">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                cx="60"
                cy="60"
                r="50"
                stroke-width="5"
                stroke="rgb(245, 245, 245)"
              />
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
          <div class="present">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                cx="60"
                cy="60"
                r="50"
                stroke-width="5"
                stroke="rgb(245, 245, 245)"
              />
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
        </div>
        <div class="secondary">
          <div class="primary-info">
            <li>you can even display this on graph</li>
            <button>display on graph</button>
          </div>
          <div class="average">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                cx="60"
                cy="60"
                r="50"
                stroke-width="5"
                stroke="rgb(245, 245, 245)"
              />
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
          <div class="absent">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                cx="60"
                cy="60"
                r="50"
                stroke-width="5"
                stroke="rgb(245, 245, 245)"
              />
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
          <div class="present">
            <li style="color: white; list-style: nonef">Average primary</li>
            <svg width="125" height="130">
              <circle
                cx="60"
                cy="60"
                r="50"
                stroke-width="5"
                stroke="rgb(245, 245, 245)
              "
              />
              <text
                id="circleText"
                x="60"
                y="60"
                text-anchor="middle"
                dominant-baseline="middle"
                fill="white"
                font-size="30"
                font-weight="bold"
              >
                0
              </text>
            </svg>
          </div>
        </div>
      </div>
      <h2
        style="
          text-align: center;
          font-size: 25px;
          padding-bottom: 20px;
          width: 1050px;
          background: linear-gradient(
            rgb(214, 223, 213),
            rgb(200, 222, 194),
            rgb(146, 154, 190)
          );
          -webkit-background-clip: text;
          background-clip: text;
          -webkit-text-fill-color: transparent;
          height: 20px;
        "
      >
        Make better decions to choose to become next programmer forever!!
      </h2>
    </div>
    <script src="leader.js"></script>
  </body>
</html>

</body>
</html>