--
-- Table structure for table `tinstallment_payment`
--

DROP TABLE IF EXISTS `tinstallment_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tinstallment_payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inv_id` int DEFAULT NULL,
  `installment_order` int DEFAULT NULL,
  `installment_paid_amount` double DEFAULT NULL,
  `amount_outstanding` double DEFAULT NULL,
  `ref_inv_id` int DEFAULT NULL,
  `date_pay_off` datetime DEFAULT NULL,
  `create_by` varchar(45) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tinstallment_payment_fk1_idx` (`inv_id`,`ref_inv_id`),
  CONSTRAINT `tinstallment_payment` FOREIGN KEY (`inv_id`) REFERENCES `tinvoice` (`inv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tinstallment_payment`
--

LOCK TABLES `tinstallment_payment` WRITE;
/*!40000 ALTER TABLE `tinstallment_payment` DISABLE KEYS */;
INSERT INTO `tinstallment_payment` VALUES (1,1,1,400000,35000,1,'2024-05-19 16:27:49',NULL,NULL,NULL,NULL),(2,2,1,170000,5000,2,'2024-05-20 16:27:49',NULL,NULL,NULL,NULL),(3,1,2,35000,0,2,'2024-05-20 16:27:49',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tinstallment_payment` ENABLE KEYS */;
UNLOCK TABLES;