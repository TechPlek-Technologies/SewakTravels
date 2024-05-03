import { Helmet } from "react-helmet";

function OurAirportMeta({ query }) {

    function getFirstWord(str) {
        // Split the string into an array of words
        let words = str?.split(", ");
        // Return the first word (if it exists)
        if (words?.length > 0) {
            return words[0];
        } else {
            return words; // Return an empty string if the input string is empty
        }
    }

    function getFirstWord1(str) {
        // Split the string into an array of words
        let words = str?.split(" ");
        // Return the first word (if it exists)
        if (words?.length > 0) {
            return words[0];
        } else {
            return words; // Return an empty string if the input string is empty
        }
    }

    const source = getFirstWord(query);

    // Convert the first letter of source and destination to lowercase
    const formattedSource = source.charAt(0).toLowerCase() + source.slice(1);
    const formattedSource1 = getFirstWord1(formattedSource);


    // Replace Agra with the dynamic destination value
    const title = `Book Cab in ${source} | ${source} Taxi`;

    const canonicalUrl = `https://sewaktravels.com/cab/${formattedSource1}-airport-taxi`;

    return (
        <>
            <Helmet>
                <title>{title}</title>
                
                <meta name="description" content={`Sewak Travels offers the Best cab booking service in ${source} with affordable Rates. Contact for Book Taxi in ${source}. Find Low-Cost Online ${source} Taxi. Book your cabs in ${source} online as soon as you book your flight`} />
                
                <meta name="keywords" content={`${source} cabs, ${source} taxi, outstation cabs from ${source}, ${source} cab service, ${source} taxi service, airport cabs in ${source},  taxi in ${source}, Cabs In ${source}, Car Rental ${source}, Taxi Service In ${source}, Cab Booking,agra airport taxi, agra airport taxi booking, agra airport cab services, agra airport cabs, agra airport taxi contact number, agra airport taxi at per km rate, prepaid taxi agra airport, agra airport car rental, agra airport taxi fare, agra airport taxi charges,airport taxi agra, airport cabs agra, agra airport car rental, agra taxi service, agra cab service, taxi service in agra, cab service in agra, agra airport taxi service, agra airport cab service,Airport Cab in ${source}`} />

                <link rel="canonical" href={canonicalUrl}/>
            </Helmet>
        </>
    );
}

export default OurAirportMeta;
