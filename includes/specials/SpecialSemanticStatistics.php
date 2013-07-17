<?php

namespace SMW;

/**
 * Class for the Special:SemanticStatistics page
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 *
 * @license GNU GPL v2+
 * @since   1.9
 *
 * @author Daniel M. Herzig
 * @author Jeroen De Dauw
 */

/**
 * Class for the Special:SemanticStatistics page
 *
 * @ingroup SpecialPage
 */
class SpecialSemanticStatistics extends SpecialPage {

	/**
	 * @see SpecialPage::__construct
	 * @codeCoverageIgnore
	 */
	public function __construct() {
		parent::__construct( 'SemanticStatistics' );
	}

	/**
	 * @see SpecialPage::execute
	 */
	public function execute( $param ) {
		Profiler::In( __METHOD__ );

		$semanticStatistics = $this->getStore()->getStatistics();
		$context = $this->getContext();
		$out = $this->getOutput();

		$out->setPageTitle( $context->msg( 'semanticstatistics' )->text() );
		$out->addHTML( $context->msg( 'smw_semstats_text'
			)->numParams(
				$semanticStatistics['PROPUSES'],
				$semanticStatistics['USEDPROPS'],
				$semanticStatistics['OWNPAGE'],
				$semanticStatistics['DECLPROPS']
			)->parseAsBlock()
		);

		Profiler::Out( __METHOD__ );
	}
}
