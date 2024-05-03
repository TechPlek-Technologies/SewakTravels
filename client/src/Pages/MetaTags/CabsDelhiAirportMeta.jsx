import { Helmet } from "react-helmet";

function CabsDelhiAirportMeta({ query,query1 }) {

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
    const fromAirport = getFirstWord(query1);

     // Convert the first letter of source and destination to lowercase
     const formattedSource = source.charAt(0).toLowerCase() + source.slice(1);
     const formatFromAirport = fromAirport.charAt(0).toLowerCase() + fromAirport.slice(1);

    // Replace "Agra" with the dynamic destination value
    const title = `Book ${fromAirport} Airport to ${source} Cabs - Sewak Travels`;

    const canonicalUrl = `https://sewaktravels.com/cab/${formatFromAirport}-airport-to-${formattedSource}-cabs`;

    return (
        <>
            <Helmet>
                <title>{title}</title>
                
                <meta name="description" content={`Book ${fromAirport} Airport to ${source} Cabs at the lowest price. Get the best deals for ${fromAirport} Airport to ${source} car rentals. Choose from a wide range of cars - Hatchbacks, Sedans & SUVs. Book ${fromAirport} airport to ${source} Taxi with Sewak Travels. Affordable ${fromAirport} Airport to ${source} taxi fare.`} />
                
                <meta name="keywords" content={`${fromAirport} Airport To ${source} Cabs, ${fromAirport} Airport To ${source} Taxi, Cabs From ${fromAirport} Airport To ${source}, Taxi From ${fromAirport} Airport To ${source}, ${fromAirport} Airport To ${source} Service, ${fromAirport} Airport To ${source} Taxi Service, ${fromAirport} Airport To ${source} Car Rental,${fromAirport} Airport To ${source} Taxi Fare, ${fromAirport} Airport To ${source} Cab Fare,Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source} oneway,Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source} taxi fare, online cab booking Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source}, cabs for Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source}, Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source} car rental, outstation taxi Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source}, outstation cabs in Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport}, Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source} taxi, Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source} distance, Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source} round trip taxi fare, outstation cab booking Indira Gandhi International Airport (Terminal 2, ${fromAirport} Airport), ${fromAirport} to ${source}, Terminal 1 ${fromAirport} Airport, IGI to ${source} cabs, Terminal 1 ${fromAirport} Airport, IGI to ${source} taxi, Terminal 1 ${fromAirport} Airport, IGI to ${source} cab, Terminal 1 ${fromAirport} Airport, IGI to ${source} cabs, Cab Booking, Airport Cabs`} />

                <link rel="canonical" href={canonicalUrl}/>
            </Helmet>
        </>
    );
}

export default CabsDelhiAirportMeta;
