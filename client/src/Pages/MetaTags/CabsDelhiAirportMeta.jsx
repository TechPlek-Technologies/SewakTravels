import { Helmet } from "react-helmet";

function CabsDelhiAirportMeta({ query }) {

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

    // Replace "Agra" with the dynamic destination value
    const title = `Book Delhi Airport to ${source} Cabs - Sewak Travels`;

    return (
        <>
            <Helmet>
                <title>{title}</title>
                
                <meta name="description" content={`Book Delhi Airport to ${source} Cabs at the lowest price. Get the best deals for Delhi Airport to ${source} car rentals. Choose from a wide range of cars - Hatchbacks, Sedans & SUVs. Book Delhi airport to ${source} Taxi with Sewak Travels. Affordable Delhi Airport to ${source} taxi fare.`} />
                
                <meta name="keywords" content={`Delhi Airport To ${source} Cabs, Delhi Airport To ${source} Taxi, Cabs From Delhi Airport To ${source}, Taxi From Delhi Airport To ${source}, Delhi Airport To ${source} Service, Delhi Airport To ${source} Taxi Service, Delhi Airport To ${source} Car Rental,Delhi Airport To ${source} Taxi Fare, Delhi Airport To ${source} Cab Fare,Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source} oneway,Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source} taxi fare, online cab booking Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source}, cabs for Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source}, Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source} car rental, outstation taxi Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source}, outstation cabs in Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi, Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source} taxi, Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source} distance, Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source} round trip taxi fare, outstation cab booking Indira Gandhi International Airport (Terminal 2, Delhi Airport), Delhi to ${source}, Terminal 1 Delhi Airport, IGI to ${source} cabs, Terminal 1 Delhi Airport, IGI to ${source} taxi, Terminal 1 Delhi Airport, IGI to ${source} cab, Terminal 1 Delhi Airport, IGI to ${source} cabs, Cab Booking, Airport Cabs`} />
            </Helmet>
        </>
    );
}

export default CabsDelhiAirportMeta;
