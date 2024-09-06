@extends('layouts.master')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>About Us</title>


    <style>
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato', serif;
            background-color: #988d8d;


        }
        .header {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            flex: 1;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif;
            font-size: 36px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .main-content {
            text-align: justify;
            flex: 1;
            padding: 20px;
        }
        .main-content p {
            font-family: 'Arial', sans-serif;
            color: white;


            padding: 10px;
            margin-bottom: 15px;
        }


        .image {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            float: right;
            margin-left: 20px;
        }


        h2, h3,h4 {
            color: #333;
        }


    </style>
</head>
<body>
<div class="container">
    <div class="header">

    </div>
    <div class="main-content">
        <h3>Welcome to our About Us page.</h3>
        <img class="image" src="/images/ted.jpg" alt="About Us Image">
        <p>TED is on a mission to discover and spread ideas that spark imagination, embrace possibility and catalyze impact. Our organization is devoted to curiosity, reason, wonder and the pursuit of knowledge — without an agenda. We welcome people from every discipline and culture who seek a deeper understanding of the world and connection with others, and we invite everyone to engage with ideas and activate them in your community.</p>
        <p>ED began in 1984 as a conference where Technology, Entertainment and Design converged, but today it spans a multitude of worldwide communities and initiatives exploring everything from science and business to education, arts and global issues. In addition to the hundreds of TED Talks curated from our annual conferences and published on TED.com, we produce original podcasts, short video series, animated TED-Ed lessons and TV programs that are translated into more than 100 languages and distributed via partnerships around the world. Each year, more than 3,000 independently run TEDx events bring people together to share ideas and bridge divides in communities on every continent. Through the Audacious Project, TED has helped catalyze more than $3 billion in funding for projects that seek to make the world more beautiful, sustainable and just. In 2020, TED launched Countdown, an initiative to accelerate solutions to the climate crisis and mobilize a movement for a net-zero future. View a full list of TED’s many programs and initiatives.</p>
        <h2>Conferences</h2>
        <p>Two or more times a year, a group of industry leaders and impactful people gather for a unique multi-day TED experience — which attendees have described as "the ultimate brain spa" and "a journey into the future in the company of those creating it." Dedicated to TED’s global mission of researching and sharing meaningful new ideas, conference speakers are selected by our curatorial team who identify and investigate ideas and innovations that matter. We invite prominent academics, educators, researchers, philanthropists, environmentalists, scientists, technologists, artists, activists and others to attend and present short lectures – our signature TED Talks – in their areas of research and expertise. It's a winning formula of brilliant, curious minds and groundbreaking content in an immersive and educational environment.</p>


        <h3>
            What is a Ted conference?
        </h3>
        <p>TED stands for Technology, Entertainment, Design — three broad subject areas that are collectively shaping our world. But a TED conference is broader still, showcasing important research and ideas from all disciplines and exploring how they connect. The format is fast-paced: 50+ talks over the course of three days to a week, in addition to interviews, debates, workshops, activities, interactive exhibits, evening events and parties. The program is designed for attendees and speakers from vastly different fields to connect, cross-fertilize and draw inspiration from unlikely places. This is the magic of TED.</p>
        <img class="image" src="/images/imagine.jpeg" alt="About Us Image">
    </div>
</div>
</body>
</html>
@endsection
