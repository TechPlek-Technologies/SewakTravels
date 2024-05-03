import { Helmet } from "react-helmet";

function DelhiToDesinationMeta1({ query,query1 }) {

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

    const destination = getFirstWord(query1);
    const source = getFirstWord(query);

     // Convert the first letter of source and destination to lowercase
    const formattedSource = source.charAt(0).toLowerCase() + source.slice(1);
    const formattedDestination = destination.charAt(0).toLowerCase() + destination.slice(1);

    // Replace "Agra" with the dynamic destination value
    const title = `${source} To ${destination} Cab Service| Book ${source} To ${destination} taxi online`;

    const canonicalUrl = `https://sewaktravels.com/cab/${formattedSource}-to-${formattedDestination}-cabs`;

    return (
        <>
            <Helmet>
                <title>{title}</title>
                
                <meta name="description" content={`Book the lowest-priced ${source} to ${destination} cab with Sewak Travels. Choose from a variety of car types, including Innova, Dzire, Sedan, SUVs.Book ${source} to ${destination} taxi service online with the cheapest fare for oneway and roundtrip.Enjoy hassle-free journeys and affordable cab services.`} />
                
                <meta name="keywords" content={`${source} to ${destination} cab, ${source} to ${destination} cabs,${source} to ${destination} taxi, ${source} to ${destination} cab booking services,${source} to ${destination} oneway, ${source} to ${destination} taxi fare, online cab booking ${source} to ${destination}, cabs for ${source} to ${destination}, ${source} to ${destination} car rental, outstation taxi ${source} to ${destination},${source} to ${destination} distance, ${source} to ${destination} round trip taxi fare, outstation cab booking ${source} to ${destination}, Taxi from ${source} to ${destination}, Cab from ${source} to ${destination}, ${source} to ${destination} Cab Service, ${source} to ${destination} cab tickets, ${source} to ${destination} sanitised cab tickets, Book ${source} to ${destination} cab tickets, ${source} to ${destination} Cabs Tickets Online, Cheapest cab tickets for ${source} to ${destination}`} />

                <link rel="canonical" href={canonicalUrl} />
            </Helmet>
        </>
    );
}

export default DelhiToDesinationMeta1;
