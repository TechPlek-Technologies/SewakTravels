import { Helmet } from "react-helmet";

function DelhiToDesinationMeta({ query }) {

    function getFirstWord(str) {
        // Split the string into an array of words
        console.log(str)
        let words = str?.split(" ");

        // Return the first word (if it exists)
        if (words?.length > 0) {
            return words[0];
        } else {
            return words; // Return an empty string if the input string is empty
        }
    }

    const destination = getFirstWord(query);

    // Replace "Agra" with the dynamic destination value
    const title = `Delhi To ${destination} Cabs Service| Book Delhi To ${destination} taxi online`;

    return (
        <>
            <Helmet>
                <title>{title}</title>
                
                <meta name="description" content={`Book the lowest-priced Delhi to ${destination} cabs with Sewak Travels. Choose from a variety of car types, including Innova, Dzire, Sedan, SUVs, and luxury cars. Enjoy hassle-free journeys and affordable cab services. Book now for a comfortable ride to explore ${destination} like a local!`} />
                
                <meta name="keywords" content={`delhi to ${destination} cab booking, delhi to ${destination} cabs, delhi to ${destination} cab booking services, cab services, affordable cabs, comfortable journey, convenient travel, Delhi to ${destination} oneway, Delhi to ${destination} taxi fare, online cab booking Delhi to ${destination}, cabs for Delhi to ${destination}, Delhi to ${destination} car rental, outstation taxi Delhi to ${destination}, outstation cabs in Delhi, Delhi to ${destination} taxi, Delhi to ${destination} distance, Delhi to ${destination} round trip taxi fare, outstation cab booking Delhi to ${destination}, Taxi from Delhi to ${destination}, Cab from Delhi to ${destination}, Delhi to ${destination} Cab Service, Delhi to ${destination} cab tickets, Delhi to ${destination} sanitised cab tickets, Book Delhi to ${destination} cab tickets, Delhi to ${destination} Cabs Tickets Online, Cheapest cab tickets for Delhi to ${destination}`} />
            </Helmet>
        </>
    );
}

export default DelhiToDesinationMeta;
