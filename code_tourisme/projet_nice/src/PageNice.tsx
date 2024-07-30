import { FunctionComponent, useState, useCallback } from 'react';
import MenuScollingDestinations from './components/MenuScollingDestinations';
import PortalPopup from './components/PortalPopup';
import styles from './PageNice.module.css';





const PageNice:FunctionComponent = () => {
  	const [isMenuScollingDestinationsOpen, setMenuScollingDestinationsOpen] = useState(false);
  	
  	const openMenuScollingDestinations = useCallback(() => {
    		setMenuScollingDestinationsOpen(true);
  	}, []);
  	
  	const closeMenuScollingDestinations = useCallback(() => {
    		setMenuScollingDestinationsOpen(false);
  	}, []);
  	
  	
  	const onHomeTextClick = useCallback(() => {
    		// Add your code here
  	}, []);
  	
  	
  	const onPhoneIconClick = useCallback(() => {
    		const anchor = document.querySelector("[data-scroll-to='footerContainer']");
    		if(anchor) {
      			anchor.scrollIntoView({"block":"start","behavior":"smooth"}) }
  	}, []);
  	
  	
  	const onPantheonContainerClick = useCallback(() => {
    		window.open("https://nice.catholique.fr/paroisse-notre-dame-de-lassomption/");
  	}, []);
  	
  	
  	const onCentrePompidouContainerClick = useCallback(() => {
    		window.open("https://monuments-aux-morts.fr/monuments?detail=123490&positionResult=13&arko_default_648970c046073--filtreGroupes%5Bmode%5D=simple&arko_default_648970c046073--filtreGroupes%5Bop%5D=AND&arko_default_648970c046073--filtreGroupes%5Bgroupes%5D%5B0%5D%5Barko_default_648975949f384%5D%5Bop%5D=AND&arko_default_648970c046073--filtreGroupes%5Bgroupes%5D%5B0%5D%5Barko_default_648975949f384%5D%5Bq%5D%5B%5D=NICE&arko_default_648970c046073--filtreGroupes%5Bgroupes%5D%5B0%5D%5Barko_default_648975949f384%5D%5Bextras%5D%5Bmode%5D=input&arko_default_648970c046073--from=0&arko_default_648970c046073--resultSize=50&arko_default_648970c046073--contenuIds%5B%5D=178974&arko_default_648970c046073--modeRestit=arko_default_648974b6631ac&arko_default_648977dc403f7--ficheFocus=");
  	}, []);
  	
  	
  	const onMuseeDOrsayContainerClick = useCallback(() => {
    		window.open("https://www.nice.fr/fr/patrimoine-et-culture/la-promenade-des-anglais");
  	}, []);
  	
  	
  	const onPalaisGarnierContainerClick = useCallback(() => {
    		window.open("https://www.allianz-riviera.fr/fr");
  	}, []);
  	
  	
  	const onNotreDameContainerClick = useCallback(() => {
    		window.open("https://nice-riviera.com/fontaine-du-soleil-a-nice/");
  	}, []);
  	
  	
  	const onSacredHeartChurchClick = useCallback(() => {
    		window.open("https://www.nice.fr/fr/culture/musees-et-galeries/palais-lascaris-le-palais");
  	}, []);
  	
  	
  	const onLouvreContainerClick = useCallback(() => {
    		window.open("https://www.sobor.fr/index.php?content=home&category=&id=&lang=en");
  	}, []);
  	
  	
  	const onTriumphalArchContainerClick = useCallback(() => {
    		window.open("https://cathedrale-nice.fr/");
  	}, []);
  	
  	
  	const onTourEffelContainerClick = useCallback(() => {
    		window.open("https://www.nice.fr/fr/parcs-et-jardins/le-parc-de-la-colline-du-chateau");
  	}, []);
  	
  	
  	const onLOGOONG2ImageClick = useCallback(() => {
    		window.open("https://pangee.org/");
  	}, []);
  	
  	
  	const onYoutubeClick = useCallback(() => {
    		window.open("https://www.youtube.com/channel/UCoLu3pgOePbiK-VFR0qO-fQ");
  	}, []);
  	
  	
  	const onInstagramClick = useCallback(() => {
    		window.open("https://www.instagram.com/nathaliekesler/?img_index=1");
  	}, []);
  	
  	
  	const onFacebookClick = useCallback(() => {
    		window.open("https://www.facebook.com/pangeeadmin/");
  	}, []);
  	
  	
  	const onLinkedinIconClick = useCallback(() => {
    		window.open("https://www.linkedin.com/company/pangee-2-00/?originalSubdomain=fr");
  	}, []);
  	
  	
  	const onTwitterIconClick = useCallback(() => {
    		window.open("https://x.com/nathaliekesler1");
  	}, []);
  	
  	return (<>
    		<div className={styles.pageNice}>
      			<div className={styles.componentNavigation}>
        				<img className={styles.bgNice1Icon} alt="" src="bg_nice 1.png" />
        				<div className={styles.header}>
          					<div className={styles.bgHeader} />
          					<div className={styles.home} onClick={onHomeTextClick}>Home</div>
          					<div className={styles.aboutUs} onClick={onHomeTextClick}>About us</div>
          					<img className={styles.phoneIcon} alt="" src="Phone.svg" onClick={onPhoneIconClick} />
          					<div className={styles.destinations} onClick={openMenuScollingDestinations}>Destinations</div>
          					<img className={styles.menuIcon} alt="" src="Menu.svg" />
          					<img className={styles.logoOng1Icon} alt="" src="LOGO-ONG 1.png" onClick={onHomeTextClick} />
        				</div>
        				<div className={styles.nice}>
          					<p className={styles.blankLine}>&nbsp;</p>
          					<p className={styles.blankLine}>NICE</p>
        				</div>
      			</div>
      			<div className={styles.yourLandmarks}>Your LANDMARKS</div>
      			<div className={styles.landmarksGallerys}>
        				<img className={styles.landmarksGallerysIcon} alt="" src="Landmarks_gallerys.svg" />
        				<div className={styles.pantheon} onClick={onPantheonContainerClick}>
          					<img className={styles.pantheonIcon} alt="" src="Pantheon.png" />
          					<b className={styles.pantheon1}>Basilica of Our Lady of the Assumption</b>
          					<div className={styles.historicalLandmarks}>Cathedral</div>
          					<i className={styles.i}>4.6</i>
          					<div className={styles.andAbove}>free</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
        				<div className={styles.centrePompidou} onClick={onCentrePompidouContainerClick}>
          					<img className={styles.pantheonIcon} alt="" src="Centre Pompidou.png" />
          					<b className={styles.pantheon1}>
            						<p className={styles.blankLine}>{`Rauba-Capeù War Memorial `}</p>
            						<p className={styles.blankLine}>Memorial in Nice</p>
          					</b>
          					<div className={styles.historicalLandmarks}>Monument</div>
          					<i className={styles.i}>4.6</i>
          					<div className={styles.andAbove}>free</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
        				<div className={styles.museeDorsay} onClick={onMuseeDOrsayContainerClick}>
          					<img className={styles.pantheonIcon} alt="" src="Musee d'Orsay.png" />
          					<b className={styles.museeDorsay1}>Promenade des Anglais</b>
          					<div className={styles.historicalLandmarks}>Street</div>
          					<i className={styles.i}>4.8</i>
          					<div className={styles.andAbove}>free</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
        				<div className={styles.palaisGarnier} onClick={onPalaisGarnierContainerClick}>
          					<img className={styles.pantheonIcon} alt="" src="Palais Garnier.png" />
          					<b className={styles.museeDorsay1}>Nice Stadium</b>
          					<div className={styles.historicalLandmarks}>Stadium</div>
          					<i className={styles.i}>4.4</i>
          					<div className={styles.andAbove}>ticket price</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
        				<div className={styles.notreDame} onClick={onNotreDameContainerClick}>
          					<img className={styles.pantheonIcon} alt="" src="Notre-Dame.png" />
          					<b className={styles.eiffelTower}>Fountain of the Sun</b>
          					<div className={styles.historicalLandmarks}>Historical landmarks</div>
          					<i className={styles.i}>4.7</i>
          					<div className={styles.andAbove}>free</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
        				<div className={styles.sacredHeartChurch} onClick={onSacredHeartChurchClick}>
          					<img className={styles.pantheonIcon} alt="" src="Sacred Heart Church.png" />
          					<b className={styles.eiffelTower}>{`Palais Lascaris `}</b>
          					<div className={styles.historicalLandmarks}>Museum</div>
          					<i className={styles.i}>4.3</i>
          					<div className={styles.andAbove}>5€ and above</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
        				<div className={styles.louvre} onClick={onLouvreContainerClick}>
          					<img className={styles.pantheonIcon} alt="" src="Louvre.png" />
          					<b className={styles.louvre1}>Saint-Nicolas Cathedral of Nice</b>
          					<div className={styles.historicalLandmarks}>Cathedral</div>
          					<i className={styles.i}>4.6</i>
          					<div className={styles.andAbove}>free</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
        				<div className={styles.triumphalArch} onClick={onTriumphalArchContainerClick}>
          					<img className={styles.pantheonIcon} alt="" src="Triumphal Arch.png" />
          					<b className={styles.pantheon1}>Sainte-Réparate Cathedral of Nice</b>
          					<div className={styles.historicalLandmarks}>Cathedral</div>
          					<i className={styles.i}>4.6</i>
          					<div className={styles.andAbove}>free</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
        				<div className={styles.tourEffel} onClick={onTourEffelContainerClick}>
          					<img className={styles.pantheonIcon} alt="" src="tour_effel.png" />
          					<b className={styles.eiffelTower}>Castle Hill</b>
          					<div className={styles.historicalLandmarks}>Park</div>
          					<i className={styles.i}>4.7</i>
          					<div className={styles.andAbove}>free</div>
          					<img className={styles.starIcon} alt="" src="Star.svg" />
        				</div>
      			</div>
      			<div className={styles.footer} data-scroll-to="footerContainer">
        				<div className={styles.emailIngenieriedepaixgmailContainer}>
          					<span className={styles.email}>{`Email :  `}</span>
          					<span className={styles.ingenieriedepaixgmailcom}>{` ingenieriedepaix@gmail.com `}</span>
        				</div>
        				<div className={styles.phone0623340257Container}>
          					<span className={styles.email}>{`Phone :   `}</span>
          					<span className={styles.ingenieriedepaixgmailcom}>0623340257</span>
        				</div>
        				<div className={styles.address56Container}>
          					<span>Address :</span>
          					<span className={styles.rueMademoiselle75015}>   56 Rue Mademoiselle, 75015 Paris</span>
        				</div>
        				<img className={styles.logoOng2Icon} alt="" src="LOGO-ONG 2.png" onClick={onLOGOONG2ImageClick} />
        				<div className={styles.contactUs}>Contact us</div>
        				<div className={styles.followUs}>Follow us</div>
        				<img className={styles.youtubeIcon} alt="" src="Youtube.svg" onClick={onYoutubeClick} />
        				<img className={styles.instagramIcon} alt="" src="Instagram.svg" onClick={onInstagramClick} />
        				<img className={styles.facebookIcon} alt="" src="Facebook.svg" onClick={onFacebookClick} />
        				<img className={styles.linkedinIcon} alt="" src="Linkedin.svg" onClick={onLinkedinIconClick} />
        				<img className={styles.twitterIcon} alt="" src="Twitter.svg" onClick={onTwitterIconClick} />
      			</div>
    		</div>
    		{isMenuScollingDestinationsOpen && (
      			<PortalPopup
        				overlayColor="rgba(113, 113, 113, 0.3)"
        				placement="Centered"
        				
        				
        				
        				
        				
        				onOutsideClick={closeMenuScollingDestinations}
        				>
        				<MenuScollingDestinations onClose={closeMenuScollingDestinations} />
      			</PortalPopup>
    		)}</>);
};

export default PageNice;
