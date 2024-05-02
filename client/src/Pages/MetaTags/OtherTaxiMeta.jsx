import { Helmet } from "react-helmet";

function OtherTaxiMeta({ query }) {

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
    const title = `Taxi Services in ${source} - Book Cab in ${source}, ${source} Cab Booking`;

    return (
        <>
            <Helmet>
                <title>{title}</title>
                
                <meta name="description" content={`Sewak Travels offers Taxi Services In ${source}- Book full day taxi in ${source}, Airport transfer, employee transportation in ${source}. Get best ${source} cab booking deals on Car Rentals from ${source} to any city. Car Rentals in ${source} available for all car types with top car operators.Book your cab now.`} />
                
                <meta name="keywords" content={`${source} Cab Booking, ${source} Taxi Booking, Book a Cab in ${source}, Cab Booking in ${source}, Taxi Booking in ${source}, ${source} Cab Booking Service, ${source} Taxi Booking Service, Local Cabs in ${source}, Local Taxi in ${source}, Taxi Fare in ${source}, Cabs in ${source}, Taxi in ${source}, Cab Service in ${source}, Taxi Service in ${source}, ${source} Cabs, ${source} Taxi, ${source} Taxi Service, ${source} Cab Service,Cabs In ${source}, Car Rental ${source}, Taxi Service In ${source} - Cab Booking,${source} cabs, Cabs In ${source}, Car Rental ${source}, Taxi Service In ${source}, Cab Booking`} />
            </Helmet>
        </>
    );
}

export default OtherTaxiMeta;
