import { Helmet } from "react-helmet";

function RentalServiceMeta({ query }) {

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
    const title = `Book Car Rental in ${source} at Affordable Prices- Sewak Travels`;

    return (
        <>
            <Helmet>
                <title>{title}</title>
                
                <meta name="description" content={`Car Rental in ${source} – Now hire a car in ${source} became easier with Sewak Travels. Experience the freedom of the road in ${source} with a car rental. Book Self Drive Cars in ${source}. We offers both affordability and convenience car rental service in ${source}.`} />
                
                <meta name="keywords" content={`Car Rental, car rental near me, Car Rental in ${source}, Car Rental ${source}, one day car rental, budget car rental, car rental services,${source} self drive car, sewak car ${source}, rent a self drive car in ${source}, self car rental in ${source},car rental in ${source}, self drive cars in ${source}, car hire in ${source},Car Rental in ${source}, ${source} Car Rental, Car on Rent in ${source}, Rent a Car in ${source}, Car Hire in ${source}, Local Car Rental in ${source}, Local Car Hire in ${source}, Local Taxi Hire in ${source}, Hire a Car in ${source}, Car Rental Service in ${source}, Cab Rental in ${source}, Rent a Car from ${source}, Car Rental Service from ${source}, Car Rental from ${source}, Cab Rental from ${source},Hourly car rental, Car Rental ${source},car rental near me, car rental services, car rental app, outstation car rental, booking car rental,one day car rental,Rentals Cabs in ${source}`} />
            </Helmet>
        </>
    );
}

export default RentalServiceMeta;
