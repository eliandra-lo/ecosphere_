
document.addEventListener('DOMContentLoaded', function () {
    // Initialize the map
    const map = L.map('map').setView([12.8797, 121.7740], 6); // Centered on the Philippines

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Define markers with their data
const markersData = [
    {
        type: 'MAMMALS',
        coords: [12.7983, 121.3644], // Coordinates for Mindoro (adjust if needed)
        color: 'blue',
        popup: `
            <strong>Tamaraws</strong><br>
            <em>Scientific Name: Bubalus mindorensis</em><br><br>
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Endemic to the Mindoro Faunal Region, Philippines<br>
            <strong>Primary Threat:</strong> Habitat loss, hunting, and human encroachment<br><br>
            <strong>Additional Information:</strong><br>
            A small, compact water buffalo that is endemic to the Mindoro Faunal Region (female weight – 180-275 kg). 
            The hair is nearly black or very dark brown except for a white patch across the throat and white “socks” 
            on the lower legs of some individuals. Both males and females have horns that are primarily directed backward, 
            not out in a broad arc as in the domestic carabao. They are currently confined to a few remote areas in rough terrain.
        `
    },

    {
        type: 'MAMMALS',
        coords: [10.2477, 122.9888], // Coordinates for Visayan Spotted Deer (adjust if needed)
        color: 'blue',
        popup: `
            <strong>Visayan Spotted Deer</strong><br>
            <em>Order: Artiodactyla | Family: Cervidae</em><br>
            <em>Scientific Name: Cervus alfredi</em><br><br>
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Primary and secondary forests of the Negros-Panay Faunal Region<br>
            <strong>Primary Threat:</strong> Habitat loss, hunting, and human encroachment<br><br>
            <strong>Additional Information:</strong><br>
            The only native medium-sized deer that is endemic to the primary and secondary forests of the Negros-Panay Faunal Region. 
            Fur generally varies from pale reddish-brown to dark brown or nearly black as in the neck of some males, with pale spots on the sides and back. 
            The underside of the jaw and upper throat are white. Adult males have small antlers, while females have none. 
            Their ecology is poorly known. They are now geographically restricted and rare, and are heavily hunted. 
            Populations are severely endangered, with those in Cebu, Guimaras, and probably Masbate now locally extinct.
        `
    },

    {
        type: 'MAMMALS',
        coords: [14.0214, 117.9249], // Coordinates for Dugong (adjust if needed)
        color: 'blue', // Color for the marker
        popup: `
            <strong>Dugong</strong><br>
            <em>Order: Sirenia | Family: Dugongidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Shallow coasts and mangrove channels throughout the Philippines<br>
            <strong>Primary Threat:</strong> Overexploitation and habitat loss<br><br>
            
            <strong>Additional Information:</strong><br>
            A marine mammal that has been recorded in the shallow coasts and mangrove channels throughout the Philippines. 
            The body, flippers, and tail flukes resemble those of a dolphin, but the Dugong lacks a dorsal fin. 
            Its body is grey but appears brown when observed at sea. The head is distinctive, with the mouth opening downward below a flat broad muzzle. 
            Adult males and some older females have tusks. Dugongs are the only marine mammals that are completely herbivorous. 
            They have been heavily exploited in the Philippines, almost to extinction, and populations have drastically declined in much of their global range, facing a high risk of extinction in the wild.
        `
    },

    {
        type: 'MAMMALS',
        coords: [9.5, 125.5], // Adjust coordinates for Dinagat Hairy-Tailed Cloud Rat habitats in the Philippines
        color: 'blue', // Color for the marker
        popup: `
            <strong>Dinagat Hairy-Tailed Cloud Rat (Cratomys australis)</strong><br>
            <em>Order: Rodentia | Family: Muridae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Forested areas of Dinagat Island, Philippines<br>
            <strong>Primary Threat:</strong> Habitat loss due to deforestation and human encroachment<br><br>
            
            <strong>Additional Information:</strong><br>
            The Dinagat Hairy-Tailed Cloud Rat is a unique rodent endemic to Dinagat Island. 
            It is characterized by its dense, soft fur and a distinctive hairy tail. 
            This species plays a crucial role in its ecosystem by aiding in seed dispersal. 
            However, it faces significant threats from habitat destruction, particularly from logging and agricultural expansion. 
            Conservation efforts are vital to protect this species and its habitat, as it is vital for maintaining the ecological balance in its native forest environment.
        `
    },

    {
        type: 'MAMMALS',
        coords: [12.4500, 121.2000], // Adjust coordinates for Ilin Island
        color: 'blue', // Color for the marker
        popup: `
            <strong>Ilin Hairy-Tailed Cloudrat (Crateromys paulus)</strong><br>
            <em>Order: Rodentia | Family: Muridae</em><br><br>
            
            <strong>Conservation Status:</strong> Possibly Extinct<br>
            <strong>Habitat:</strong> Restricted to Ilin Island, south of Mindoro<br>
            <strong>Primary Threat:</strong> Habitat loss and uncertainty in distribution<br><br>
            
            <strong>Additional Information:</strong><br>
            A moderately large cloud rat with a total length of approximately 470 mm. It has short fur, large pale ears, 
            and a furry white-tipped tail that is about 85% of the length of its head and body. The fur on the back is primarily 
            dark brown, while the abdomen is creamy or creamy-grey. The hind feet are short and broad. Their ecology is largely 
            unknown, and their distribution is extremely restricted. It has been reported to be extinct on Ilin, but unverified 
            reports suggest its possible occurrence on southern Mindoro.
        `
    },

    {
        type: 'MAMMALS',
        coords: [13.0, 122.5], // Adjust coordinates for Golden-Crowned Fruit Bat habitats in the Philippines
        color: 'blue', // Color for the marker, reflecting its golden crown
        popup: `
            <strong>Golden-Crowned Fruit Bat (Acerodon jubatus)</strong><br>
            <em>Order: Chiroptera | Family: Pteropodidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Lowland forests and fruiting trees in the Philippines<br>
            <strong>Primary Threat:</strong> Habitat destruction and hunting<br><br>
            
            <strong>Additional Information:</strong><br>
            The Golden-Crowned Fruit Bat is a large bat species known for its striking golden crown of fur. 
            It plays a vital role in the ecosystem as a pollinator and seed disperser, helping to maintain forest health. 
            This bat primarily feeds on fruits, particularly figs, and is often found in lowland tropical forests. 
            Unfortunately, it faces severe threats from deforestation and hunting for food and traditional medicine. 
            Conservation efforts are critical to protect this unique species and its habitat in the Philippines.
        `
    },

    {
        type: 'MAMMALS',
        coords: [10.3157, 123.8854], // Adjust coordinates for Cebu or Negros Islands
        color: 'blue', // Color for the marker
        popup: `
            <strong>Philippine Bare-Backed Fruit Bat (Dobsonia chapmani)</strong><br>
            <em>Order: Chiroptera | Family: Pteropodidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Limestone karst caves and lowland forests of Cebu and Negros Islands<br>
            <strong>Primary Threat:</strong> Hunting, habitat destruction, and disturbance by guano miners<br><br>
            
            <strong>Additional Information:</strong><br>
            A large, sturdily-built fruit bat with a forearm length of 123-133 mm and a weight of 125-143 g. 
            This species is endemic to the limestone karst caves and lowland forests of Cebu and Negros Islands. 
            The wings attach to the body along the midline of the back, giving the appearance of a naked back. 
            There is a claw on the thumb but not on the leading edge of the wing. They are cave-roosting bats that primarily feed on figs. 
            Populations have been threatened by hunting, habitat destruction, and disturbances from guano miners, 
            making them currently very rare. Discovered populations since 2000 are small and isolated.
        `
    },

    {
        type: 'MAMMALS',
        coords: [10.6713, 122.9511], // Adjust coordinates for the Negros-Panay Faunal Region
        color: 'blue', // Color for the marker
        popup: `
            <strong>Visayan Warty Pig (Sus cebifrons)</strong><br>
            <em>Order: Artiodactyla | Family: Suidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Primary and secondary forests of the Negros-Panay Faunal Region<br>
            <strong>Primary Threat:</strong> Heavy hunting and hybridization with domestic pigs<br><br>
            
            <strong>Additional Information:</strong><br>
            The Visayan warty pig is the only native small pig endemic to the primary and secondary forests of the Negros-Panay Faunal Region. 
            Its body is covered with sparse, dark brown bristly hair, typically longest along the spine and over the neck and back of the head. 
            The tusks and warts on the snout are usually conspicuous. Their ecology is poorly understood, and populations are becoming increasingly rare. 
            They face threats from heavy hunting and hybridization with domestic pigs, leading to local extinctions in Cebu and Guimaras.
        `
    },

    {
        type: 'BIRDS',
        coords: [7.0, 125.0], // Adjust coordinates for Philippine Eagle habitats
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Philippine Eagle (Pithecophaga jefferyi)</strong><br>
            <em>Order: Accipitriformes | Family: Accipitridae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Tropical rainforests in the Philippines<br>
            <strong>Primary Threat:</strong> Deforestation and hunting<br><br>
            
            <strong>Additional Information:</strong><br>
            The Philippine Eagle is one of the largest and most powerful birds of prey in the world. It is endemic to the Philippines and is known for its impressive size and striking appearance, with a distinctive crest of feathers on its head. The species is critically endangered, primarily due to habitat loss from deforestation and hunting pressures. Conservation efforts are crucial to protect this national symbol of the Philippines.
        `
    },

    {
        type: 'BIRDS',
        coords: [11.0, 124.0], // Adjust coordinates for Indigo-Banded Kingfisher habitats in Eastern Visayas
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Indigo-Banded Kingfisher (Ceyx cyanopectus)</strong><br>
            <em>Order: Coraciiformes | Family: Alcedinidae</em><br><br>
            
            <strong>Conservation Status:</strong> Vulnerable<br>
            <strong>Habitat:</strong> Banks of freshwater rivers and streams in forests and woodlands (up to 1000 m) in Eastern Visayas, including Leyte, Samar, and Bohol<br>
            <strong>Primary Threat:</strong> Habitat disturbance and limited occupancy<br><br>
            
            <strong>Additional Information:</strong><br>
            The Indigo-Banded Kingfisher is a very small kingfisher recently split from the closely related Southern Silvery Kingfisher. 
            Its bill, head, throat, wings, tail, and belly are black, adorned with metallic white dots on the crown. 
            The back to the rump is silvery-white with azure blue gloss, while the lore, mid-belly, and ear are ivory white, with the breast to belly in cobalt blue. 
            The orange-red feet have three toes, and sexes look similar. The species is fairly common to uncommon, but continued disturbance of its habitats has led to its classification as Vulnerable.
        `
    },

    {
        type: 'BIRDS',
        coords: [15.0, 120.9], // Adjust coordinates for Baer's Pochard sightings in the Philippines
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Baer’s Pochard (Aythya baeri)</strong><br>
            <em>Order: Anseriformes | Family: Anatidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Freshwater marshes and lakes<br>
            <strong>Primary Threat:</strong> Wetland destruction and over-harvesting<br><br>
            
            <strong>Additional Information:</strong><br>
            Baer’s Pochard is a large diving duck, measuring approximately 43 cm in length. It is an accidental visitor to the Philippines, 
            having been spotted several times in the Candaba marshes. This species is usually found in freshwater marshes and lakes in small groups, 
            often associated with other diving ducks but can be distinguished by its white undertail coverts. 
            It is differentiated from the Common Pochard by a white wing band and from the Greater Scaup/Tufted Duck by a reddish-brown band from the breast to the mantle. 
            Baer’s Pochard is globally threatened and is apparently undergoing an extremely rapid population decline, now absent or found in 
            extremely reduced numbers across most of its former breeding and wintering grounds. It is common nowhere due to habitat loss and over-harvesting.
        `
    },

    {
        type: 'BIRDS',
        coords: [5.0, 120.0], // Adjust coordinates for Sulu Hornbill habitats in Tawi-Tawi
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Sulu Hornbill (Anthracoceros montani)</strong><br>
            <em>Order: Bucerotiformes | Family: Bucerotidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Lowland forests of the Sulu Archipelago, particularly Tawi-Tawi<br>
            <strong>Primary Threat:</strong> Habitat loss from forest conversion, exploitation, and limited nesting sites<br><br>
            
            <strong>Additional Information:</strong><br>
            The Sulu Hornbill is an extremely rare bird, unique to the Sulu Archipelago, with a tiny population currently confined to the lowland forests of Tawi-Tawi. 
            This moderately large hornbill is characterized by its blackish plumage, black bill and casque, and a striking white tail. 
            Its presence can be recognized by its loud shrieks and cackling calls. Due to rapid declines from ongoing habitat loss, exploitation, and a lack of suitable nesting sites, 
            it is classified as Critically Endangered. Conservation efforts should focus on protecting remaining habitats in Tawi-Tawi and may include captive breeding initiatives.
        `
    },

    {
        type: 'BIRDS',
        coords: [10.7, 122.5], // Adjust coordinates for Walden's Hornbill habitats in Panay and Negros
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Walden's Hornbill (Rhabdotorrhinus waldeni)</strong><br>
            <em>Order: Bucerotiformes | Family: Bucerotidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Forests below 1000 m in elevation on Panay and Negros Islands<br>
            <strong>Primary Threat:</strong> Habitat loss and exploitation<br><br>
            
            <strong>Additional Information:</strong><br>
            Walden's Hornbill is an extremely rare, moderately-sized hornbill unique to the islands of Panay and Negros, 
            and it has been extirpated from Guimaras. This species inhabits forests below 1000 m and travels in pairs or small groups across the forest canopy. 
            It can be distinguished from the sympatric Tarictic hornbills by its larger size and loud nasal stuttering calls. 
            The plumage is generally black with a green gloss, and the tail features buffy coloration with black terminal bands. 
            Males have a rufous head and breast (with yellow skin), while females are predominantly black. 
            Walden's Hornbill is critically endangered due to continued habitat loss and exploitation.
        `
    },

    {
        type: 'BIRDS',
        coords: [10.7, 122.8], // Adjust coordinates for Visayan Hornbill habitats in Western Visayas
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Visayan Hornbill (Penelopides panini)</strong><br>
            <em>Order: Bucerotiformes | Family: Bucerotidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Forests usually below 1500 m in Western Visayas, including Negros, Panay, Masbate, Guimaras, Pan de Azucar, Sicogon, and Ticao<br>
            <strong>Primary Threat:</strong> Habitat loss and exploitation<br><br>
            
            <strong>Additional Information:</strong><br>
            The Visayan Hornbill is a small-sized hornbill endemic to the Western Visayas, where it inhabits forest habitats. 
            It has been extirpated from smaller islands, including distinct extinct subspecies like ticaensis. 
            The sexes are distinguishable from fledging: males are blackish-brown with buffy white and dark parts that have a green gloss, along with white facial skin. 
            Females are all blackish-brown with blue facial skin. The tail is buff white with black and rufous bands. 
            This species is uncommon to rare in remnant forests on Negros and Panay, facing limited occupancy and a declining population due to ongoing habitat destruction and exploitation.
        `
    },

    {
        type: 'BIRDS',
        coords: [9.1, 117.3], // Adjust coordinates for Red-Vented Cockatoo habitats in Palawan
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Red-Vented Cockatoo (Cacatua haematuropygia)</strong><br>
            <em>Order: Psittaciformes | Family: Cacatuidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Old-growth coastal forests and Sonneratia-rich mangroves in extreme lowland areas of Palawan<br>
            <strong>Primary Threat:</strong> Habitat loss and poaching for the pet trade<br><br>
            
            <strong>Additional Information:</strong><br>
            The Red-Vented Cockatoo was formerly distributed across many islands in the Philippines but now has its stronghold on Palawan. 
            This species is restricted to extreme lowland areas for breeding, nesting in cavities of large-diameter trees, primarily below 50 m. 
            Its core habitat consists of old-growth coastal forests and Sonneratia-rich mangroves. 
            Although the decline has been somewhat mitigated by intensive conservation efforts, viable populations are now concentrated in very few areas on Palawan. 
            The species continues to suffer from habitat loss and poaching for the pet trade. Low breeding success rates, correlating with drought events, 
            along with its occurrence on low coral islands, suggest vulnerability to the effects of climate change.
        `
    },

    {
        type: 'BIRDS',
        coords: [11.0, 124.0], // Adjust coordinates for Philippine Leafbird habitats in Samar, Leyte, Cebu, and Mindanao
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Philippine Leafbird (Chloropsis flavipennis)</strong><br>
            <em>Order: Passeriformes | Family: Chloropseidae</em><br><br>
            
            <strong>Conservation Status:</strong> Vulnerable<br>
            <strong>Habitat:</strong> Primary forests, secondary forests, and degraded habitats below 1000 m in the Philippines<br>
            <strong>Primary Threat:</strong> Destruction of lowland forest habitat<br><br>
            
            <strong>Additional Information:</strong><br>
            The Philippine Leafbird is endemic to the Philippines, found primarily on the islands of Samar, Leyte, Cebu, and Mindanao. 
            This lime green bird is darker above than below, featuring yellow-green lores, a greenish-yellow eye-ring, throat, and outer edges to its primaries. 
            Its bill is dark horn with a lighter tip and cutting edge. While it inhabits primary forests, it can also be seen in secondary forests or degraded habitats. 
            Unfortunately, its population is rapidly decreasing due to the continuous destruction of its lowland forest habitat.
        `
    },

    {
        type: 'BIRDS',
        coords: [11.0, 124.0], // Adjust coordinates for Philippine Leafbird habitats in Samar, Leyte, Cebu, and Mindanao
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Philippine Leafbird (Chloropsis flavipennis)</strong><br>
            <em>Order: Passeriformes | Family: Chloropseidae</em><br><br>
            
            <strong>Conservation Status:</strong> Vulnerable<br>
            <strong>Habitat:</strong> Primary forests, secondary forests, and degraded habitats below 1000 m in the Philippines<br>
            <strong>Primary Threat:</strong> Destruction of lowland forest habitat<br><br>
            
            <strong>Additional Information:</strong><br>
            The Philippine Leafbird is endemic to the Philippines, found primarily on the islands of Samar, Leyte, Cebu, and Mindanao. 
            This lime green bird is darker above than below, featuring yellow-green lores, a greenish-yellow eye-ring, throat, and outer edges to its primaries. 
            Its bill is dark horn with a lighter tip and cutting edge. While it inhabits primary forests, it can also be seen in secondary forests or degraded habitats. 
            Unfortunately, its population is rapidly decreasing due to the continuous destruction of its lowland forest habitat.
        `
    },

    {
        type: 'BIRDS',
        coords: [13.0, 121.3], // Adjust coordinates for Mindoro Bleeding-Heart habitats on Mindoro Island
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Mindoro Bleeding-Heart (Gallicolumba platenae)</strong><br>
            <em>Order: Columbiformes | Family: Columbidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Primary and advanced secondary forests from lowlands up to 1000 m on Mindoro Island<br>
            <strong>Primary Threat:</strong> Habitat conversion and degradation, trapping pressure<br><br>
            
            <strong>Additional Information:</strong><br>
            The Mindoro Bleeding-Heart is a rare pigeon measuring about 30 cm in length, found exclusively on Mindoro Island. 
            It inhabits primary and advanced secondary forests, foraging on or near the ground. 
            Nests are typically built 1.5 to 2 meters above the ground in small bushes. 
            This species is distinguished by its small orange breast spot, a very narrow incomplete breast band, and white spots on chestnut wings. 
            It is threatened due to its restricted habitat, which is increasingly converted and degraded. The population continues to decline due to ongoing trapping pressures.
        `
    },

    {
        type: 'BIRDS',
        coords: [10.5, 122.5], // Adjust coordinates for Negros Bleeding-Heart habitats on Negros and Panay
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Negros Bleeding-Heart (Gallicolumba keayi)</strong><br>
            <em>Order: Columbiformes | Family: Columbidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Forests on the islands of Negros and Panay<br>
            <strong>Primary Threat:</strong> Forest loss and habitat fragmentation<br><br>
            
            <strong>Additional Information:</strong><br>
            The Negros Bleeding-Heart is a rare and poorly known pigeon species, measuring about 30 cm in length. 
            It occurs exclusively on the islands of Negros and Panay. Distinctive features include a broad white wing bar, a white center of the breast with a narrow orange breast stripe, 
            and a nearly complete metallic green/purple breast band. This species has an extremely small and severely fragmented population, 
            which is likely experiencing a continuing decline due to forest loss on the only two islands where it is found.
        `
    },

    {
        type: 'BIRDS',
        coords: [5.0, 120.0], // Adjust coordinates for Sulu Bleeding-Heart habitats in the Sulu Archipelago
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Sulu Bleeding-Heart (Gallicolumba menagei)</strong><br>
            <em>Order: Columbiformes | Family: Columbidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered (possibly extinct)<br>
            <strong>Habitat:</strong> Lowland forests in the Sulu Archipelago<br>
            <strong>Primary Threat:</strong> Habitat destruction, hunting, and trapping<br><br>
            
            <strong>Additional Information:</strong><br>
            The Sulu Bleeding-Heart is a medium-sized, short-tailed pigeon characterized by a bright orange central patch on an otherwise white breast. 
            It is considered one of the least known bird species in the world and is extremely rare, having not been sighted or heard with certainty for over a century. 
            Although there are occasional reports claiming that it was once quite abundant until the 1970s, extensive logging and habitat destruction, along with hunting and trapping, 
            strongly suggest that any remaining population is likely tiny. Its continued existence is in serious doubt.
        `
    },

    {
        type: 'BIRDS',
        coords: [7.0, 125.0], // Adjust coordinates for Amethyst Brown Dove habitats in the Philippines
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Amethyst Brown Dove (Phapitreron amethystinus)</strong><br>
            <em>Order: Columbiformes | Family: Columbidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered (due to subspecies frontalis)<br>
            <strong>Habitat:</strong> Forest and forest edges up to 2000 m, more common above 1000 m in Mindanao<br>
            <strong>Primary Threat:</strong> Habitat destruction, particularly affecting the Cebu subspecies<br><br>
            
            <strong>Additional Information:</strong><br>
            The Amethyst Brown Dove is a medium-sized dove measuring 26-27 cm in length. It is commonly found in forested areas and forest edges, often seen singly or in pairs. 
            In Mindanao, it tends to be more common at elevations above 1000 m. This species is distinguished by its larger bill, less conspicuous white ‘ear’, 
            violet upper back, and cinnamon undertail coverts, which help separate it from the White-eared Brown Dove. 
            While the general population appears stable and the dove occurs on a good number of islands, it is classified as Critically Endangered due to the subspecies frontalis, 
            which is endemic to Cebu Island and may even be extinct.
        `
    },

    {
        type: 'BIRDS',
        coords: [5.0, 120.0], // Adjust coordinates for Tawi-Tawi Brown Dove habitats in Tawi-Tawi and Sanga-Sanga
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Tawi-Tawi Brown Dove (Phapitreron cinereiceps)</strong><br>
            <em>Order: Columbiformes | Family: Columbidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Lowland forests in Tawi-Tawi and Sanga-Sanga, primarily in the middle and upper canopy<br>
            <strong>Primary Threat:</strong> Habitat loss and fragmentation<br><br>
            
            <strong>Additional Information:</strong><br>
            The Tawi-Tawi Brown Dove is endemic to the islands of Tawi-Tawi and Sanga-Sanga, measuring about 26-27 cm in length. 
            This uncommon dove inhabits lowland forests, typically found in the middle and upper canopy. 
            It can be distinguished from the Amethyst Brown Dove by the lack of a white line below the eye, a shorter bill, and greyer underparts. 
            The species probably has a very small population and is believed to have undergone a rapid decline due to the reduction in forest habitat, 
            which is now restricted to a few small fragments within a very limited range. Increased fragmentation of its habitat continues to threaten its survival.
        `
    },

    {
        type: 'BIRDS',
        coords: [10.5, 122.5], // Adjust coordinates for Negros Fruit Dove habitats on Negros Island
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Negros Fruit Dove (Ptilinopus arcanus)</strong><br>
            <em>Order: Columbiformes | Family: Columbidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Forests on Negros Island<br>
            <strong>Primary Threat:</strong> Habitat destruction and possibly hunting<br><br>
            
            <strong>Additional Information:</strong><br>
            The Negros Fruit Dove is a very small, vivid dark green fruit-dove, measuring about 16.5 cm in length. 
            Known only from a single female specimen captured on Negros Island, nearly nothing is known about this elusive species. 
            Despite surveys, it has not been recorded since its initial capture, leading to concerns about its existence. 
            It is conceivable that it still inhabits areas on Negros or even on Panay. Any remaining population is likely to be tiny and is undergoing a continuing decline due to extensive habitat destruction and possibly hunting.
        `
    },

    {
        type: 'BIRDS',
        coords: [12.5, 122.5], // Adjust coordinates for Pink-Bellied Imperial Pigeon habitats across the Philippines
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Pink-Bellied Imperial Pigeon (Ducula poliocephala)</strong><br>
            <em>Order: Columbiformes | Family: Columbidae</em><br><br>
            
            <strong>Conservation Status:</strong> Near Threatened<br>
            <strong>Habitat:</strong> Second growth and virgin forests up to 1500 m in elevation across the Philippines<br>
            <strong>Primary Threat:</strong> Hunting and habitat loss<br><br>
            
            <strong>Additional Information:</strong><br>
            The Pink-Bellied Imperial Pigeon is endemic to the Philippines and occurs on all major islands except for Palawan. 
            This species is the only large pigeon with a green breast and a pinkish-grey belly, typically found in second growth and virgin forests. 
            It is seen singly or in small groups. Notable features include a grey band on its green tail, a characteristic it shares with the Mindoro Imperial Pigeon, which has an all-grey breast. 
            The Pink-Bellied Imperial Pigeon is considered scarce and is suspected to have a moderately small population that may be in moderately rapid decline due to hunting and the removal of its favored lowland forest habitat.
        `
    },

    {
        type: 'BIRDS',
        coords: [13.0, 121.0], // Adjust coordinates for Black-Hooded Coucal habitats on Mindoro Island
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Black-Hooded Coucal (Centropus steerii)</strong><br>
            <em>Order: Cuculiformes | Family: Cuculidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Dense canopy and understory vegetation in primary and advanced secondary forests up to 950 m on Mindoro Island<br>
            <strong>Primary Threat:</strong> Habitat loss and degradation<br><br>
            
            <strong>Additional Information:</strong><br>
            The Black-Hooded Coucal is a rare and secretive bird, measuring about 46 cm in length. It is more often heard than seen, as it tends to skulk in dense vegetation. 
            This species inhabits primary and advanced secondary forests from lowlands up to 950 m on Mindoro Island. 
            Both males and females appear similar, with a black head and throat glossed with green, and a tail and wings that are blackish-brown with a bronzy green sheen. 
            The rest of the body is dark brown. The Black-Hooded Coucal is threatened due to its restricted habitat, which is increasingly being converted and degraded.
        `
    },

    {
        type: 'BIRDS',
        coords: [10.3, 123.9], // Adjust coordinates for Cebu Flowerpecker habitats in Cebu
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Cebu Flowerpecker (Dicaeum quadricolor)</strong><br>
            <em>Order: Passeriformes | Family: Dicaeidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Remaining forests on Cebu<br>
            <strong>Primary Threat:</strong> Habitat destruction and fragmentation<br><br>
            
            <strong>Additional Information:</strong><br>
            The Cebu Flowerpecker is known only from two localities in Cebu. Males have glossy blue-black upperparts, wings, and tail, 
            with a distinctive triangular orange-red patch on the mantle. Their underparts are grey with a white line extending from the chin to the abdomen, 
            and the lower back is yellow. Females lack the triangular marking on the mantle and yellow lower back, featuring light olive-grey underparts and a yellowish-white center of the belly. 
            This species was formerly thought to be extinct until its rediscovery in 1992. The population is severely fragmented due to the limited remaining forest on Cebu.
        `
    },

    {
        type: 'BIRDS',
        coords: [12.0, 122.0], // Adjust coordinates for Tablas Drongo habitats on Tablas Island
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Tablas Drongo (Dicrurus menagei)</strong><br>
            <em>Order: Passeriformes | Family: Dicruridae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Lowland forests and second growth below 1000 m on Tablas Island<br>
            <strong>Primary Threat:</strong> Habitat loss due to encroachment<br><br>
            
            <strong>Additional Information:</strong><br>
            The Tablas Drongo is a long-tailed island-endemic species, measuring approximately 355 mm in length. It inhabits lowland forests and second growth, usually below 1000 m, exclusively on Tablas Island in the Visayan Sea. 
            Recently split from the polytypic Hair-Crested Drongo, it is the largest in size and features the longest, deeply forked tail. 
            Its plumage is generally velvety black with a green gloss, and the black underparts are spangled with metallic blue-green. 
            The drongo has a distinctive frontal crest, and both sexes are similar in appearance. 
            It is categorized as Critically Endangered due to its extremely limited distribution and the ongoing encroachment of the few remaining patches of lowland forest habitats on Tablas Island.
        `
    },

    {
        type: 'BIRDS',
        coords: [11.5795, 124.9748], // Adjust coordinates for Christmas Island Frigatebird habitats
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Christmas Island Frigatebird (Fregata andrewsi)</strong><br>
            <em>Order: Sulformes | Family: Fregatidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Coastal areas and cliffs on Christmas Island<br>
            <strong>Primary Threat:</strong> Habitat loss and population decline<br><br>
            
            <strong>Additional Information:</strong><br>
            The Christmas Island Frigatebird is a large seabird measuring 90-100 cm in length, found in the Sulu Sea, which is the northeasternmost part of its range. 
            This mostly black, fork-tailed bird features a white belly and a pale bar on its upper wings. Adult males are distinguished by their red gular pouch and small white belly patch, as well as a long, dark grey, hooked bill. 
            Females have a black head, throat, and spur on the sides of their upper breast, complemented by a white collar, breast, belly, and spur extending to the axillaries, with a pink bill and red orbital ring. 
            This species has a small population that breeds within a very limited area on just one island, and it is continuing to decline due to various threats.
        `
    },

    {
        type: 'BIRDS',
        coords: [16.5, 121.0], // Adjust coordinates for historical Sarus Crane habitats in the Philippines
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Sarus Crane (Grus antigone)</strong><br>
            <em>Order: Gruiformes | Family: Gruidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered (possibly extirpated in the Philippines)<br>
            <strong>Habitat:</strong> Marshes, floodplains, and rice fields (historically in the Philippines)<br>
            <strong>Primary Threat:</strong> Habitat loss, exploitation, and pollution<br><br>
            
            <strong>Additional Information:</strong><br>
            The Sarus Crane is a rare bird, likely extirpated in the Philippines, although populations still exist in India and northern Australia. 
            It was once commonly found in marshes, floodplains, and rice fields of central and northern Luzon. 
            Believed to be the tallest flying bird, it is distinguished by its red head and legs, helping to separate it from the Grey and Great-billed Herons. 
            Globally, the species has suffered a rapid population decline, projected to continue due to widespread reductions in the extent and quality of its wetland habitats, 
            along with exploitation and the effects of pollutants.
        `
    },

    {
        type: 'BIRDS',
        coords: [7.5, 125.5], // Adjust coordinates for observed habitats in the Philippines
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Chinese Crested Tern (Thalasseus bernsteini)</strong><br>
            <em>Order: Charadriiformes | Family: Laridae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Coastal areas along the East China Sea and non-breeding sites in Southeast Asia<br>
            <strong>Primary Threat:</strong> Coastal degradation and overfishing<br><br>
            
            <strong>Additional Information:</strong><br>
            The Chinese Crested Tern is a very rare and poorly known migrant, measuring 38-43 cm in length. Its only known breeding sites are along the coast of East China, 
            while non-breeding sites are found along the coasts of Thailand, Sarawak, the Moluccas, and the Philippines. 
            It was recently observed in Davao Gulf (2018) and has historical records from Manila Bay (1905). 
            This tern resembles the slightly larger and more common Great Crested Tern but is distinguished by its very pale grey upperparts, white forked tail, 
            and a distinct two-toned yellow bill with black at or near the tip. The species has a very small global population with a restricted breeding area, 
            and it faces threats from coastal degradation and overfishing throughout its range.
        `
    },

    {
        type: 'BIRDS',
        coords: [12.5, 121.0], // Adjust coordinates for habitats of the Celestial Monarch across the Philippines
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Celestial Monarch (Hypothymis coelestis)</strong><br>
            <em>Order: Passeriformes | Family: Monarchidae</em><br><br>
            
            <strong>Conservation Status:</strong> Near Threatened<br>
            <strong>Habitat:</strong> Canopy and middle stories of lowland forests, edges, and secondary growth up to 750 m<br>
            <strong>Primary Threat:</strong> Habitat loss and fragmentation<br><br>
            
            <strong>Additional Information:</strong><br>
            The Celestial Monarch is a widespread endemic species found on Luzon, Negros, Sibuyan, Samar, Dinagat, Mindanao, Basilan, and Tawi-Tawi. 
            This slim, electric blue flycatcher exhibits an entire plumage of dark vivid sky-blue, with a wash of lilac on the cheeks and throat, 
            and a duller grey-blue on the belly. It features a narrow yellowish eye-ring and elongated, paler electric blue crown feathers that form a droopy crest, 
            which usually lies flat but is raised when excited. Females are slightly duller in coloration. 
            The Celestial Monarch inhabits the canopy and middle stories of lowland forests and edges, as well as secondary growth, up to 750 m. 
            Its population is declining rapidly due to widespread reductions in the extent and quality of lowland forest, leading to severe fragmentation of its presumably small population.
        `
    },

    {
        type: 'BIRDS',
        coords: [16.4, 121.5], // Adjust coordinates for habitats of the Isabela Oriole in northern Sierra Madre
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Isabela Oriole (Oriolus isabellae)</strong><br>
            <em>Order: Passeriformes | Family: Oriolidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Canopy of lowland forests, particularly bamboo forests in northern Sierra Madre<br>
            <strong>Primary Threat:</strong> Deforestation and habitat conversion<br><br>
            
            <strong>Additional Information:</strong><br>
            The Isabela Oriole is endemic to Luzon Island and now occurs in only a small part of its previous range, found in a few remaining sites in northern Sierra Madre. 
            This bird typically inhabits the canopy of lowland forest, particularly in bamboo forests, and is usually seen singly or in pairs. 
            Key identifying features include a heavy bluish or greyish bill (not reddish), yellow lores (not white), and unstreaked underparts with a slightly darker breast. 
            The population size of the Isabela Oriole is extremely low, and its lowland habitat is declining due to deforestation and conversion into agricultural lands.
        `
    },

    {
        type: 'BIRDS',
        coords: [12.0, 121.5], // Adjust coordinates for Colasisi habitats across the Philippines
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Colasisi (Loriculus philippensis)</strong><br>
            <em>Order: Psittaciformes | Family: Psittacidae</em><br><br>
            
            <strong>Conservation Status:</strong> Least Concern (but some subspecies are threatened)<br>
            <strong>Habitat:</strong> Various forest types, montane forests, and urban gardens<br>
            <strong>Primary Threat:</strong> Habitat loss and rarity of specific subspecies<br><br>
            
            <strong>Additional Information:</strong><br>
            The Colasisi is the smallest Philippine parrot and is common throughout various forest types, including montane forests and even in gardens in urban areas. 
            Its diet primarily consists of flowers and nectar, particularly from coconuts and bananas. 
            This species is easily identified by the red coloration on its head and rump. 
            There are ten recognized races of Colasisi in the Philippines, where it is endemic. 
            Notably, the Cebu and Mindoro subspecies are very rare, contributing to their threatened status despite the overall species being classified as Least Concern.
        `
    },

    {
        type: 'BIRDS',
        coords: [15.5, 121.0], // Adjust coordinates for Green Racket-tail habitats on Luzon Island
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Green Racket-tail (Prioniturus luconensis)</strong><br>
            <em>Order: Psittaciformes | Family: Psittacidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Lowland forests and edges on Luzon Island<br>
            <strong>Primary Threat:</strong> Habitat loss and trapping pressure<br><br>
            
            <strong>Additional Information:</strong><br>
            The Green Racket-tail is the smallest of the racket-tails and is considered uncommon, becoming increasingly rare. 
            It is found in pairs or small groups in lowland forests and forest edges exclusively on Luzon Island. 
            This species is loud and noisy, characterized by its all-green plumage with no blue in the face or upperparts. 
            It can be distinguished from the larger Blue-naped and Blue-backed Parrots, which have longer tails and red bills. 
            The population of the Green Racket-tail is estimated to be very small and is believed to be less numerous than previously thought, 
            with ongoing declines attributed to trapping pressure and the loss and degradation of suitable habitats.
        `
    },

    {
        type: 'BIRDS',
        coords: [14.5995, 120.9842], // Adjust coordinates for Blue-winged Racket-tail habitats in the Greater Sulu region
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Blue-winged Racket-tail (Prioniturus verticalis)</strong><br>
            <em>Order: Psittaciformes | Family: Psittacidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Forests, edges, mangroves, and adjacent cultivated areas on six islands<br>
            <strong>Primary Threat:</strong> Habitat loss and persecution<br><br>
            
            <strong>Additional Information:</strong><br>
            The Blue-winged Racket-tail is endemic to the Greater Sulu region, restricted to six islands: Tawi-Tawi, Bongao, Manuk Manka, Tumindao, Sanga-Sanga, and Sibutu. 
            This species is uncommon, found in forests, edges, and mangroves, and is especially noisy in flight. 
            It is the largest of the racket-tails and can be distinguished from the Blue-naped and Blue-backed Parrots by its presence of rackets, a whitish bill, and the absence of blue on the back or rump. 
            Males feature a large red spot in the center of the crown. The Blue-winged Racket-tail is threatened due to an extremely small population, which is suspected to be in rapid and accelerating decline due to ongoing forest clearance and persecution. 
            Conservation efforts are hindered by security issues in the region.
        `
    },

    {
        type: 'BIRDS',
        coords: [13.0, 122.0], // Adjust coordinates for Blue-naped Parrot habitats across the Philippines
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Blue-naped Parrot (Tanygnathus lucionensis)</strong><br>
            <em>Order: Psittaciformes | Family: Psittacidae</em><br><br>
            
            <strong>Conservation Status:</strong> Vulnerable<br>
            <strong>Habitat:</strong> Forests and forest edges up to 1000 m<br>
            <strong>Primary Threat:</strong> Illegal pet trade<br><br>
            
            <strong>Additional Information:</strong><br>
            The Blue-naped Parrot is a medium-sized bird characterized by its blue-green forehead, sides of the head, and lores, with a crown and nape that display varying amounts of blue. 
            It has a yellowish-green collar, a bill that can be red, orange, or yellowish towards the tip, and olive-green to black legs. 
            This species is typically found in forests and forest edges up to 1000 meters and occurs singly, in pairs, or in groups. 
            While several races are present, the Blue-naped Parrot is currently under pressure due to the demands of the illegal pet trade, 
            highlighting the need for more effective implementation of laws to protect the species, which could significantly impact its population.
        `
    },

    {
        type: 'BIRDS',
        coords: [5.0, 120.0], // Adjust coordinates for Blue-backed Parrot habitats across its range
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Blue-backed Parrot (Tanygnathus sumatranus)</strong><br>
            <em>Order: Psittaciformes | Family: Psittacidae</em><br><br>
            
            <strong>Conservation Status:</strong> Vulnerable<br>
            <strong>Habitat:</strong> Forests and forest edges in Sulawesi, Talaud Island, and the Philippines<br>
            <strong>Primary Threat:</strong> Wildlife trade and habitat conversion<br><br>
            
            <strong>Additional Information:</strong><br>
            The Blue-backed Parrot is found in Sulawesi, Talaud Island, and the Philippines, where it has four endemic subspecies: 
            *duponti* (Luzon), *freeri* (Polillo), *everetti* (Leyte, Mindanao, Negros, Panay, and Samar), and *burdigii* (Basbas, Bongao, Jolo, Loran, Sanga-Sanga, Sibutu, and Tawi-Tawi). 
            This parrot is much bigger than the Blue-naped Parrot (*T. lucionensis*), with variations in size and color among the races, 
            where *everetti* is the largest. The body of *duponti* is yellow-green, while *burdigii* is dark green with a shade of blue in the lower back. 
            The Blue-backed Parrot faces significant conservation issues due to wildlife trade and habitat conversion. 
            Further studies into its ecology and habits are essential for understanding the pressures on this species.
        `
    },

    {
        type: 'BIRDS',
        coords: [9.2, 123.5], // Adjust coordinates for Streak-breasted Bulbul habitats on Siquijor and Tablas
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Streak-breasted Bulbul (Hypsipetes siquijorensis)</strong><br>
            <em>Order: Passeriformes | Family: Pycnonotidae</em><br><br>
            
            <strong>Conservation Status:</strong> Vulnerable<br>
            <strong>Habitat:</strong> Forests and forest edges on Siquijor and Tablas<br>
            <strong>Primary Threat:</strong> Habitat loss<br><br>
            
            <strong>Additional Information:</strong><br>
            The Streak-breasted Bulbul is common in the remaining forests on Siquijor and Tablas Islands but is threatened by habitat loss, and it may be extinct on Cebu. 
            This species is noisy and conspicuous, often found singly or in small groups. 
            It can be identified by its brown head and upperparts, brownish-grey underparts, and a paler, greyer throat and upper breast. 
            Although relatively common in its remaining habitat, the forests of these few islands are rapidly declining, posing a significant risk to the species' survival.
        `
    },

    {
        type: 'BIRDS',
        coords: [54.0, 135.0], // Adjust coordinates for Spoon-billed Sandpiper habitats, typically found in East Asia
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Spoon-billed Sandpiper (Eurynorhynchus pygmeus)</strong><br>
            <em>Order: Charadriiformes | Family: Scolopacidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Sandy coastal areas with sparse vegetation<br>
            <strong>Primary Threat:</strong> Habitat alteration due to pollution, climate change, and human disturbance<br><br>
            
            <strong>Additional Information:</strong><br>
            The Spoon-billed Sandpiper is a rare and accidental visitor, measuring 14-16 cm in length. 
            It is a unique small sandpiper characterized by its distinct spatulate or spoon-like beak, with black beak and feet. 
            Breeding adults display a red-brown head, neck, and breast with dark brown streaks, while their upperparts are blackish with buff and pale rufous fringing. 
            Non-breeding adults have a grey-streaked head, pale brownish-grey upperparts, and white underparts. 
            This species breeds only in sandy coastal areas with sparse vegetation, typically no more than 5 km from the shore, and feeds on invertebrates by probing into muddy sands. 
            The Spoon-billed Sandpiper faces significant threats from pollution, climate change, and human disturbance, with hunting of shorebirds also contributing to its decline.
        `
    },

    {
        type: 'BIRDS',
        coords: [9.0, 119.0], // Adjust coordinates for Masked Booby habitats, specifically Tubbataha Reefs
        color: 'yellow', // Color for the marker
        popup: `
            <strong>Masked Booby (Sula dactylatra)</strong><br>
            <em>Order: Sulformes | Family: Sulidae</em><br><br>
            
            <strong>Conservation Status:</strong> Near Threatened<br>
            <strong>Habitat:</strong> Offshore waters, particularly around Tubbataha Reefs Natural Park<br>
            <strong>Primary Threat:</strong> Previous extirpation and habitat disturbance<br><br>
            
            <strong>Additional Information:</strong><br>
            The Masked Booby is a large seabird measuring about 80 cm in length. Once a breeding bird in the Philippines, this rare species has been extirpated from the country. 
            However, in recent years, a single individual has reestablished itself in the Tubbataha Reefs Natural Park, which may signal the potential return of more individuals to the region. 
            This species forages offshore by diving headfirst from heights of 10 to 20 meters to catch fish with its bill. 
            Adult Masked Boobies can be distinguished from Red-footed Boobies by their dark tail. 
            Immature individuals resemble Brown Boobies but have mottled white and brown upperparts along with a diagnostic white collar.
        `
    },

    {
        type: 'REPTILES',
        coords: [11.0, 123.0], // Adjust coordinates for Hawksbill Turtle habitats in the Philippines
        color: 'maroon', // Color for the marker
        popup: `
            <strong>Hawksbill Turtle (Eretmochelys imbricata)</strong><br>
            <em>Order: Testudines | Family: Cheloniidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Coastal and marine environments throughout the Philippines<br>
            <strong>Primary Threat:</strong> Habitat destruction and illegal trade<br><br>
            
            <strong>Additional Information:</strong><br>
            The Hawksbill Turtle is widespread in the Philippines and is easily recognized by its narrow head, which has two pairs of prefrontal scales and a non-serrated jaw. 
            Its carapace is bony and lacks ridges, featuring overlapping scutes and four lateral scutes. 
            The carapace is elliptical in shape, with flippers that have two claws. 
            Coloration varies, with hues of orange, brown, or yellow. 
            This species is under severe threat due to habitat destruction and numerous natural and man-made factors, including illegal trade for commercial use and as curios.
        `
    },

    {
        type: 'REPTILES',
        coords: [7.5, 124.5], // Adjust coordinates for Philippine Crocodile habitats in the Philippines
        color: 'maroon', // Color for the marker
        popup: `
            <strong>Philippine Crocodile (Crocodylus mindorensis)</strong><br>
            <em>Order: Crocodilia | Family: Crocodylidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Rivers, creeks, ponds, and marshes from sea level up to 850 masl<br>
            <strong>Primary Threat:</strong> Habitat destruction and small population size<br><br>
            
            <strong>Additional Information:</strong><br>
            The Philippine Crocodile is endemic to the Philippines and is characterized by its broad snout and a brown body with black markings, along with heavy armor plates. 
            Males can grow up to 3 meters long, while females are smaller; both sexes typically mature at around 1.5 meters and weigh about 15 kg. 
            Their preferred habitats include rivers, creeks, ponds, and marshes, thriving in shallow natural ponds, man-made water reservoirs, narrow creeks, mangrove areas, and fast-flowing larger rivers. 
            Their habitat can overlap with that of *C. porosus* (saltwater crocodile) in areas such as Ligawasan Marsh on Mindanao. 
            The Philippine Crocodile faces several threats, including habitat destruction, a small population size, overutilization, habitat encroachment, persecution, and entanglement in fishing nets.
        `
    },

    {
        type: 'REPTILES',
        coords: [10.0, 123.0], // Adjust coordinates for Saltwater Crocodile habitats in the Philippines
        color: 'maroon', // Color for the marker
        popup: `
            <strong>Saltwater Crocodile (Crocodylus porosus)</strong><br>
            <em>Order: Crocodilia | Family: Crocodylidae</em><br><br>
            
            <strong>Conservation Status:</strong> Least Concern<br>
            <strong>Habitat:</strong> Inland lakes, swamps, marshes, coastal brackish waters, and tidal sections of rivers<br>
            <strong>Primary Threat:</strong> Habitat destruction and hunting<br><br>
            
            <strong>Additional Information:</strong><br>
            The Saltwater Crocodile, also known as the Indo-Pacific Crocodile or Estuarine Crocodile, is the largest reptile alive today, 
            distributed from India to Australia. Males can grow up to 7 meters in length, while females typically reach up to 2.5 meters. 
            They have large heads with ridges running from the eyes and meeting at the center of the snout. 
            The scutes are smaller than in other species, and the scales are oval-shaped. 
            Juveniles have pale yellow bodies and tails with black stripes and light spots, while adults darken to lighter tan or grey with white or yellow areas. 
            Their heavy overlapping jaws contain 64 to 68 teeth. 
            Preferred habitats include inland lakes, swamps, marshes, coastal brackish waters, and tidal sections of rivers, where they construct terrestrial nests and basking areas. 
            Major threats include habitat destruction, the restricted distribution of small populations, and hunting.
        `
    },

    {
        type: 'REPTILES',
        coords: [10.0, 120.0], // Adjust coordinates for Leatherback Turtle habitats in the Philippines
        color: 'maroon', // Color for the marker
        popup: `
            <strong>Leatherback Turtle (Dermochelys coriacea)</strong><br>
            <em>Order: Testudines | Family: Dermochelyidae</em><br><br>
            
            <strong>Conservation Status:</strong> Vulnerable<br>
            <strong>Habitat:</strong> Open ocean and coastal waters<br>
            <strong>Primary Threat:</strong> Habitat destruction and pollution<br><br>
            
            <strong>Additional Information:</strong><br>
            The Leatherback Turtle is unique among sea turtles as it lacks a hard shell. 
            It has a deeply notched upper jaw with two cusps, and its large, elongated carapace is flexible, featuring seven distinct ridges that run the entire length of the body. 
            All flippers are clawless. The carapace color varies from dark grey to black, often marked with white or pale spots, while the plastron ranges from whitish to black, marked by five ridges. 
            This species faces significant threats from habitat destruction and various natural and man-made factors, including pollution and boat propeller strikes.
        `
    },

    {
        type: 'REPTILES',
        coords: [9.5, 118.7], // Adjust coordinates for Palawan Forest Turtle habitats in the Philippines
        color: 'maroon', // Color for the marker
        popup: `
            <strong>Palawan Forest Turtle (Siebenrockiella leytensis)</strong><br>
            <em>Order: Testudines | Family: Geoemydidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Streams, creeks, and medium-sized rivers in lowland forests and second-growth vegetation<br>
            <strong>Primary Threat:</strong> Habitat destruction and exotic animal trade<br><br>
            
            <strong>Additional Information:</strong><br>
            The Palawan Forest Turtle is an endemic species confined to the Palawan Island Group. 
            Its carapace is wide, somewhat flattened, and heavily buttressed. The turtle has a large head with a projecting, rounded snout, and its nostrils are positioned anteriorly. 
            This species is typically found in streams, creeks, and medium-sized rivers within lowland forest areas and second-growth vegetation. 
            It faces significant threats from habitat destruction, as well as natural and man-made factors such as the exotic animal trade and traditional medicine practices. 
            The Palawan Forest Turtle has a limited geographic range and restricted population, with observed reductions in its population size.
        `
    },

    {
        type: 'REPTILES',
        coords: [11.3, 122.0], // Adjust coordinates for Panay Forest Monitor Lizard habitats in the Philippines
        color: 'maroon', // Color for the marker
        popup: `
            <strong>Panay Forest Monitor Lizard (Varanus mabitang)</strong><br>
            <em>Order: Squamata | Family: Varanidae</em><br><br>
            
            <strong>Conservation Status:</strong> Critically Endangered<br>
            <strong>Habitat:</strong> Primary and slightly degraded lowland and lower montane forests<br>
            <strong>Primary Threat:</strong> Habitat destruction and fragmentation<br><br>
            
            <strong>Additional Information:</strong><br>
            The Panay Forest Monitor Lizard is an endemic species to the Philippines, occurring only on Panay Island. 
            This arboreal lizard is highly specialized and inhabits primary and slightly degraded forests, typically found at elevations from 200 to around 1,000 meters above sea level, though it is extremely rare above 500 meters. 
            The remaining range of this species encompasses approximately 400 km² of severely fragmented forest within the Northwest Panay Mountain Range. 
            It is assessed as critically endangered due to ongoing habitat destruction, a small geographic range, small population size, and a continuing decline in population numbers.
        `
    },


    {
        type: 'AMPHIBIANS',
        coords: [11.3, 124.8], // Adjust coordinates for Gigantes Limestone Frog habitats in the Philippines
        color: 'green', // Color for the marker
        popup: `
            <strong>Gigantes Limestone Frog (Platymantis insulatus)</strong><br>
            <em>Order: Anura | Family: Ceratobatrachidae</em><br><br>
            
            <strong>Conservation Status:</strong> Endangered<br>
            <strong>Habitat:</strong> Limestone karst forests and caves in forested lowlands<br>
            <strong>Primary Threat:</strong> Habitat destruction from agriculture and human encroachment<br><br>
            
            <strong>Additional Information:</strong><br>
            The Gigantes Limestone Frog is a small amphibian, with a snout-vent length (SVL) of 38-42 mm. 
            It features a narrow head with a round-pointed snout and a protruding upper jaw. 
            The fingers are long and narrow, lacking webs, and the first finger is shorter than the second. 
            Its coloration varies, with dorsum and upper lateral surfaces ranging from greyish olive green to live-brown; lighter specimens are heavily mottled with large irregular brownish or dark blotches. 
            The upper lips and loreal regions exhibit irregular dark blotches or bands, while the hind limbs display narrow, irregular dark crossbands. 
            This species is endemic to the limestone karst forests and caves in the forested lowlands of the Gigantes Islands. 
            It faces significant threats from shifting agriculture, human encroachment on forests over limestone karst and caves, as well as guano mining and quarrying.
        `
    }

    ];

    // Create markers and store them in a group
    const markers = [];
    markersData.forEach(data => {
        const marker = L.marker(data.coords, {
            icon: L.divIcon({
                className: 'custom-icon',
                html: `<i class="fas fa-map-marker-alt" style="color: ${data.color}; font-size: 24px;"></i>`
            })
        }).bindPopup(data.popup);
        markers.push({ type: data.type, marker });
    });

    // Function to update markers on the map
    function updateMarkers(selectedType) {
        markers.forEach(({ type, marker }) => {
            if (selectedType === 'ALL' || selectedType === type) {
                marker.addTo(map);
            } else {
                map.removeLayer(marker);
            }
        });
    }

    // Initial display of all markers
    updateMarkers('ALL');

    // Handle dropdown selection
    const dropdown = document.querySelector('.dropdown');
    const dropdownContent = document.querySelector('.dropdown-content');
    const dropdownBtn = document.querySelector('.dropdown-btn');

    // Show/hide dropdown menu
    dropdownBtn.addEventListener('click', function () {
        dropdown.classList.toggle('show');
    });

    // Handle dropdown option click
    dropdownContent.addEventListener('click', function (e) {
        if (e.target.tagName === 'A') {
            const selectedType = e.target.getAttribute('data-value');
            const selectedText = e.target.textContent.trim();  // Get the text of the selected option
            const selectedIcon = e.target.querySelector('i').outerHTML;  // Get the icon of the selected option

            // Update the dropdown button's text and icon
            dropdownBtn.innerHTML = `${selectedIcon} ${selectedText}`;

            updateMarkers(selectedType);
            dropdown.classList.remove('show');
        }
    });
});
