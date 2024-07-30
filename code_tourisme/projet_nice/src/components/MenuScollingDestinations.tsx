import { FunctionComponent, useCallback } from 'react';
import { useNavigate } from "react-router-dom";
import styles from './MenuScollingDestinations.module.css';
import React from 'react';

export type MenuScollingDestinationsType = {
  className?: string;
  onClose: () => void;
};

const MenuScollingDestinations: FunctionComponent<MenuScollingDestinationsType> = ({ className = "", onClose }) => {
  const navigate = useNavigate();

  const onParisTextClick = useCallback(() => {
    // Add your code here
  }, []);

  const onNiceTextClick = useCallback(() => {
    navigate("/");
  }, [navigate]);

  return (
    <div className={[styles.menuScollingDestinations, className].join(' ')}>
      <button onClick={onClose}>Close</button>
      <div className={styles.destinations}>Destinations</div>
      <div className={styles.paris} onClick={onParisTextClick}>Paris</div>
      <div className={styles.etretat} onClick={onParisTextClick}>Etretat</div>
      <div className={styles.honfleur} onClick={onParisTextClick}>Honfleur</div>
      <div className={styles.laRochelle} onClick={onParisTextClick}> La Rochelle</div>
      <div className={styles.strasbourg} onClick={onParisTextClick}>Strasbourg</div>
      <div className={styles.bordeaux} onClick={onParisTextClick}>Bordeaux</div>
      <div className={styles.marseilles} onClick={onParisTextClick}>Marseilles</div>
      <div className={styles.rennes} onClick={onParisTextClick}>Rennes</div>
      <div className={styles.nice} onClick={onNiceTextClick}>Nice</div>
      <div className={styles.toulouse} onClick={onParisTextClick}>Toulouse</div>
      <div className={styles.lourdes} onClick={onParisTextClick}>Lourdes</div>
      <div className={styles.lyon} onClick={onParisTextClick}>Lyon</div>
    </div>
  );
};

export default MenuScollingDestinations;
