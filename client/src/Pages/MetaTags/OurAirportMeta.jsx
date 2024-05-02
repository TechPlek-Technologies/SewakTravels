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
    const source = getFirstWord(query);

    // Replace Agra with the dynamic destination value
    const title = `Book Airport Cab in ${source} | ${source} Airport Taxi - Book now`;

    return (
        <>
            <Helmet>
                <title>{title}</title>
                
                <meta name="description" content={`Sewak Travels offer Best Airport cab booking service in ${source} with affordable Rates, Clean Cars & trained drivers. Contact for Book Airport Taxi in ${source}.Find Low Cost Online ${source} Airport taxi, to anywhere and anytime in ${source}. Book your Airport cabs in ${source} online as soon as you book your flight.`} />
                
                <meta name="keywords" content={`${source} airport cabs, ${source} airport taxi, outstation cabs from ${source} airport, ${source} airport cab service, ${source} airport taxi service, airport cabs in ${source}, airport taxi in ${source}, Cabs In ${source} Airport, Car Rental ${source} Airport, Taxi Service In ${source} Airport, Cab Booking,agra airport taxi, agra airport taxi booking, agra airport cab services, agra airport cabs, agra airport taxi contact number, agra airport taxi at per km rate, prepaid taxi agra airport, agra airport car rental, agra airport taxi fare, agra airport taxi charges,airport taxi agra, airport cabs agra, agra airport car rental, agra taxi service, agra cab service, taxi service in agra, cab service in agra, agra airport taxi service, agra airport cab service,Airport Cab in ${source}`} />
            </Helmet>
        </>
    );
}

export default OurAirportMeta;
