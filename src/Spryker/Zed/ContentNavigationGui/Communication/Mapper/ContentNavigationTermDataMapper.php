<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ContentNavigationGui\Communication\Mapper;

use Generated\Shared\Transfer\ContentNavigationTermTransfer;

class ContentNavigationTermDataMapper implements ContentNavigationTermDataMapperInterface
{
    /**
     * @param array|null $navigationData
     *
     * @return \Generated\Shared\Transfer\ContentNavigationTermTransfer
     */
    public function mapNavigationDataToContentNavigationTermTransfer(?array $navigationData): ContentNavigationTermTransfer
    {
        $contentNavigationTermTransfer = new ContentNavigationTermTransfer();
        if ($navigationData === null) {
            return $contentNavigationTermTransfer;
        }

        $contentNavigationTermTransfer->fromArray($navigationData);

        return $contentNavigationTermTransfer;
    }
}
